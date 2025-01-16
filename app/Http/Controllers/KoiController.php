<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;
use App\Models\History;
use Illuminate\Support\Str; // Import the Str class
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;



class KoiController extends Controller
{
    public function index()
    {
        $koi = Koi::with(['breeder', 'variety', 'bloodline', 'history'])->take(10)->where('status', 'Available')->latest()->get();

        // Return the suggestions as JSON
        return response()->json([
            'data' => $koi
        ]);
    }

    public function getKoi($id)
    {
        $koi = Koi::with(['breeder', 'variety', 'bloodline', 'history'])->find($id);
        return response()->json(['koi' => $koi]);
    }

    public function getKoiHistory(Request $request, $koi_id)
    {
        $koi = Koi::find($koi_id);

        if (!$koi) {
            return response()->json(['error' => 'Koi not found.'], 404);
        }

        // Fetch history records and group by year
        $history = $koi->history->groupBy('date')->map(function ($items, $date) {
            return $items->sortBy('created_at'); // Sort by created_at within each year group
        })->sortKeys(); // Sort by year (keys) in ascending order

        return response()->json(['history' => $history]);
    }

    public function getHistoryByYear($koi_id, $date)
    {
        $history = History::where('koi_id', $koi_id)->where('date', $date)->first();

        if (!$history) {
            return response()->json(['error' => 'History not found.'], 404);
        }

        return response()->json(['history' => $history]);
    }


    public function storeHistory(Request $request)
    {
        // Retrieve the data from the request
        $date = $request->input('date');
        $size = $request->input('size');
        $koi_id = $request->input('koi_id'); // Retrieve koi_id
        $newPhotos = $request->file('photos'); // New photos uploaded (handling files)
        $deletedPhotos = json_decode($request->input('deleted_photos'), true); // Deleted photos
        $editedPhotos = json_decode($request->input('edited_photos'), true); // Edited photos (old -> new)

        // Get current photos from the database for the specific koi_id and date
        $currentPhotos = History::where('koi_id', $koi_id)->where('date', $date)->first();
        $currentPhotos = $currentPhotos ? explode('|', $currentPhotos->photo) : [];
        $oldPhotos = $currentPhotos; // Store the old photos for comparison

        // Handle deleted photos: Delete from storage and remove from database record
        foreach ($deletedPhotos as $deletedPhoto) {
            $storagePath = public_path('img/koi/' . $deletedPhoto);

            // Check if the file exists in storage and delete it
            if (Storage::exists($storagePath)) {
                Storage::delete($storagePath);
            }

            // Remove the deleted photo from the current photos array
            $currentPhotos = array_filter($currentPhotos, function ($photo) use ($deletedPhoto) {
                return $photo !== $deletedPhoto;
            });
        }

        // Re-index the array after filtering deleted photos
        $currentPhotos = array_values($currentPhotos);

        // Handle edited photos: Replace the old photo with the new one
        if ($editedPhotos) {
            foreach ($editedPhotos as $index => $edit) {
                // Retrieve the old and new photo from the request
                $oldPhoto = $edit['oldPhoto'];  // The filename of the photo being replaced
                $newPhoto = $request->file('edited_photos')[$index]; // Get the corresponding new file

                if ($oldPhoto && $newPhoto) {
                    // Delete the old photo if it exists
                    $storagePath = public_path('img/koi/photo/' . $oldPhoto);
                    if (Storage::exists($storagePath)) {
                        Storage::delete($storagePath); // Delete the old photo
                    }

                    // Process the new photo (upload it and save it)
                    $filename = uniqid() . '.' . $newPhoto->getClientOriginalExtension();
                    $newPhoto->move(public_path('img/koi/photo'), $filename);

                    // Replace the old photo with the new photo in the current photos array
                    $currentPhotos = array_map(function ($photo) use ($oldPhoto, $filename) {
                        return $photo === $oldPhoto ? $filename : $photo;
                    }, $currentPhotos);
                }
            }
        }

        // Handle new photos: Store them and add to the database
        $newFilePaths = [];
        if ($newPhotos) {
            // Use the handleFileUploads function to store all the new photos
            $newFilePaths = $this->handleFileUploads($newPhotos, 'img/koi/photo');
            $currentPhotos = array_merge($currentPhotos, $newFilePaths); // Append new photos to the existing ones
        }

        // Use updateOrCreate to either create or update the history record for the specific koi_id and date
        $koiHistory = History::updateOrCreate(
            [
                'koi_id' => $koi_id, // Ensure you update or create based on koi_id and date
                'date' => $date
            ],
            [
                'size' => $size,
                // Store all the photos (filenames only) in the database, separated by "|"
                'photo' => implode('|', $currentPhotos)
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'History saved successfully!',
            'data' => [
                'new_file_paths' => $newFilePaths,
                'editedPhotos' => $editedPhotos,
                'current_photos' => $currentPhotos,
                'history' => $koiHistory
            ]
        ]);
    }







    public function deleteHistory($koi_id, $date)
    {
        $history = History::where('koi_id', $koi_id)->where('date', $date)->first();
        if (!$history) {
            return response()->json(['error' => 'History not found.'], 404);
        }

        $photos = $history->photo ? explode('|', $history->photo) : [];

        // Delete photos
        foreach ($photos as $photo) {
            $photoPath = public_path('img/koi/photo/' . $photo);
            if (file_exists($photoPath)) {
                unlink($photoPath); // Delete the file
            }
        }

        $history->delete();

        return response()->json(['success' => true, 'message' => 'History data deleted successfully.']);
    }



    public function searchKoi(Request $request)
    {
        $query = $request->input('query');

        $results = Koi::leftJoin('variety', 'koi.variety_id', '=', 'variety.id')
            ->leftJoin('breeder', 'koi.breeder_id', '=', 'breeder.id')
            ->where(function ($q) use ($query) {
                $q->whereRaw('LOWER(koi.code) LIKE ?', ['%' . strtolower($query) . '%'])
                    ->orWhereRaw('LOWER(koi.nickname) LIKE ?', ['%' . strtolower($query) . '%'])
                    ->orWhereRaw('LOWER(variety.name) LIKE ?', ['%' . strtolower($query) . '%'])
                    ->orWhereRaw('LOWER(breeder.name) LIKE ?', ['%' . strtolower($query) . '%']);
            })
            ->select('koi.*', 'variety.name as variety_name', 'breeder.name as breeder_name')
            ->paginate(8); // Keep pagination

        return response()->json($results);
    }

    private function handleFileUploads($files, $destinationPath)
    {
        if (!$files) {
            return [];
        }

        return array_map(function ($file) use ($destinationPath) {
            // Ensure the file is valid
            if (!$file->isValid()) {
                return ''; // Skip invalid files
            }

            // Get the original filename and its extension
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename, preserving the original name
            $uniqueFilename = uniqid() . "_" . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

            // Move the file to the specified path
            $file->move($destinationPath, $uniqueFilename);

            return $uniqueFilename; // Return just the filename
        }, $files);
    }


    /**
     * Handle single file upload.
     */
    private function handleSingleFileUpload($file, $destinationPath)
    {
        if (!$file || !$file->isValid()) {
            return '';
        }

        // Get the original filename and its extension
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        // Create a unique filename, preserving the original name
        $uniqueFilename = uniqid() . "_" . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

        // Move the file to the specified path
        $file->move($destinationPath, $uniqueFilename);

        return $uniqueFilename; // Return just the filename, not the full path
    }

}
