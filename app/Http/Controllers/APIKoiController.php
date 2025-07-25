<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;
use App\Models\Variety;
use App\Models\Breeder;
use App\Models\ContactUs;
use App\Models\News;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class APIKoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // Default pagination parameters
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);

        // Define valid statuses with correct casing
        $validStatuses = [
            'available' => 'Available',
            'sold' => 'Sold',
            'death' => 'Death',
            'auction' => 'Auction',
            'inauction' => 'InAuction'
        ];

        // Get and normalize the `status` parameter
        $statusInput = $request->input('status');

        // Initialize query
        $koiQuery = Koi::with(['breeder', 'variety', 'bloodline', 'history']);

        // Apply status filter only if `status` is provided and valid
        if ($statusInput !== null) {
            $normalizedStatus = strtolower($statusInput);
            if (!isset($validStatuses[$normalizedStatus])) {
                return response()->json(['message' => 'Invalid status'], 400);
            }

            $status = $validStatuses[$normalizedStatus]; // Use the correct casing
            $koiQuery->where('status', $status);
        }

        // Apply search filters
        if ($request->filled('code')) {
            $koiQuery->where('koi.code', 'LIKE', '%' . $request->input('code') . '%');
        }
        if ($request->filled('nickname')) {
            $koiQuery->where('koi.nickname', 'LIKE', '%' . $request->input('nickname') . '%');
        }
        if ($request->filled('variety')) {
            $koiQuery->whereHas('variety', function (Builder $query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->input('variety') . '%');
            });
        }
        if ($request->filled('breeder')) {
            $koiQuery->whereHas('breeder', function (Builder $query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->input('breeder') . '%');
            });
        }

        // Paginate results
        $koi = $koiQuery->latest('updated_at')->paginate($perPage, ['*'], 'page', $page);
        $koi->appends($request->query()); // Preserve query parameters in pagination links

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
        // Validate input

        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:Available,Sold,Pending,Auction,InAuction,Death',
            'buyer_name' => 'required_if:status,Sold|string|nullable',
            'sell_date' => 'required_if:status,Sold|date|date_format:Y-m-d|nullable', // ✅ Ensures YYYY-MM-DD format
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find the Koi or return 404 if not found
        $koi = Koi::findOrFail($id);

        // Prepare update data
        $updateData = [
            'status' => $request->status,
        ];

        // Only update buyer_name and sell_date if status is "Sold"
        if ($request->status === 'Sold') {
            $updateData['buyer_name'] = $request->input('buyer_name');
            $updateData['sell_date'] = $request->input('sell_date') ? Carbon::parse($request->input('sell_date')) : null;
        }

        $koi->update($updateData);

        return response()->json([
            'message' => 'Koi status updated successfully',
            'data' => $koi,
        ]);
    }

    public function getBreeders(Request $request)
    {
        // Ensure we get unique breeder names from the related breeder table
        $breeders = Breeder::select('name')->distinct()->orderBy('name')->get();

        return response()->json($breeders);
    }

    public function getVarieties(Request $request)
    {
        // Ensure we get unique variety names from the related variety table
        $varieties = Variety::select('name')->distinct()->orderBy('name')->get();

        return response()->json($varieties);
    }

    public function getContactUs()
    {
        $contactus = ContactUs::latest()->first();
        return response()->json($contactus);
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

    public function news(Request $request)
    {
        $news = News::latest()->paginate(10);

        return response()->json([
            'data' => $news,
            'message' => 'News fetched successfully',
        ]);
    }

    public function newsDetails($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (!$news) {
            return response()->json([
                'message' => 'News not found',
            ], 404);
        }

        return response()->json([
            'data' => $news,
            'message' => 'News details fetched successfully',
        ]);
    }

}
