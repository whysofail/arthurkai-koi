<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;
use App\Models\History;
use Illuminate\Support\Str; // Import the Str class

class KoiController extends Controller
{
    public function index()
    {
        $koiSuggestions = Koi::with(['breeder', 'variety', 'bloodline', 'history'])->take(10)->where('status', 'Available')->latest()->get();

        // Return the suggestions as JSON
        return response()->json([
            'suggestions' => $koiSuggestions
        ]);
    }

    public function getKoi($id)
    {
        $koi = Koi::with(['breeder', 'variety', 'bloodline', 'history'])->find($id);
        return response()->json(['koi' => $koi]);
    }

    public function getKoiHistory(Request $request, $id)
    {
        $koi = Koi::find($id);

        if (!$koi) {
            return response()->json(['error' => 'Koi not found.'], 404);
        }

        // Fetch history records and group by year
        $history = $koi->history->groupBy('year')->map(function ($items, $year) {
            return $items->sortBy('created_at'); // Sort by created_at within each year group
        })->sortKeys(); // Sort by year (keys) in ascending order

        return response()->json(['history' => $history]);
    }

    public function getHistoryByYear($koi_id, $year)
    {
        $history = History::where('koi_id', $koi_id)->where('year', $year)->first();

        if (!$history) {
            return response()->json(['error' => 'History not found.'], 404);
        }

        return response()->json($history);
    }



    public function storeHistory(Request $request)
    {

        $history = History::updateOrCreate(
            ['koi_id' => $request->koi_id, 'year' => $request->year],
            ['size' => $request->size]
        );

        if ($request->hasFile('photos')) {
            $photos = [];
            foreach ($request->file('photos') as $photo) {
                $fileName = Str::uuid() . '_' . $photo->getClientOriginalName(); // Generate UUID for unique filename
                $photo->move(public_path('img/koi/photo'), $fileName);
                $photos[] = $fileName;
            }
            $history->photo = implode('|', $photos);
            $history->save();
        }

        return response()->json(['success' => 'History data saved successfully.']);
    }

    public function searchKoi(Request $request)
    {
        // Get the query from the request
        $query = strtoupper($request->input('query'));

        // Search Koi by name or species
        $results = Koi::where('code', 'LIKE', "%{$query}%")->where('status', 'Available')
            ->get();

        // Return the results as JSON
        return response()->json($results);
    }


}
