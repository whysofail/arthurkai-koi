<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;
use Illuminate\Support\Facades\Validator;

class APIKoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Define default query parameters
        $defaultParams = [
            'page' => $request->get('page', 1), // Default to page 1
            'per_page' => $request->get('per_page', 10), // Default to 10 items per page
        ];

        // If parameters are missing, redirect with defaults
        if (!$request->has(['page', 'per_page'])) {
            return redirect()->route('kois.index', array_merge($request->all(), $defaultParams));
        }

        // Fetch paginated Koi records
        $koi = Koi::with(['breeder', 'variety', 'bloodline', 'history'])
            ->where('status', 'Available')
            ->latest()
            ->paginate($request->input('per_page', 10));

        // Append additional query parameters to pagination links
        $koi->appends($request->query());

        // Return the paginated response as JSON
        return response()->json($koi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fetch the Koi record by its id, including related models
        $koi = Koi::with(['breeder', 'variety', 'bloodline', 'history'])->find($id);

        // Check if the record exists
        if (!$koi) {
            return response()->json(['message' => 'Koi not found'], 404); // Return 404 if not found
        }

        // Return the Koi record as a JSON response
        return response()->json($koi);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Define the validation rules
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:Available,Sold,Pending,Auction',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Return the validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find the Koi record by its ID
        $koi = Koi::find($id);

        // Check if the Koi exists
        if (!$koi) {
            return response()->json(['message' => 'Koi not found'], 404);
        }

        // Update the status
        $koi->status = $request->input('status');
        $koi->save();

        // Return success response
        return response()->json([
            'message' => 'Koi status updated successfully',
            'data' => $koi,
        ]);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            ->get();

        if ($results->isEmpty()) {
            return response()->json(['message' => 'No results found.'], 404);
        }

        return response()->json($results);
    }
}
