<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;


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

    public function getKoiHistory($id)
    {
        $koi = Koi::find($id);
        $history = $koi->history;
        return response()->json(['history' => $history]);
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
