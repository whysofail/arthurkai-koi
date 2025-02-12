<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;
use App\Models\Variety;
use App\Models\Breeder;
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

        // Get and normalize the `status` parameter
        $status = ucfirst(strtolower($request->input('status', 'Available')));
        if (!in_array($status, ['Available', 'Sold', 'Death', 'Auction'])) {
            return response()->json(['message' => 'Invalid status'], 400);
        }

        // Initialize query
        $koiQuery = Koi::with(['breeder', 'variety', 'bloodline', 'history'])
            ->where('status', $status);

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
        $koi = $koiQuery->latest()->paginate($perPage);
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
            'status' => 'required|string|in:Available,Sold,Pending,Auction,inAuction',
            'buyer_name' => 'required_if:status,Sold|string|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find the Koi or return 404 if not found
        $koi = Koi::findOrFail($id);

        // Update fields
        $updateData = ['status' => $request->status];

        if ($request->status === 'Sold') {
            if ($request->input('buyer_name') === null) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => ['buyer_name' => ['The buyer name field is required when status is Sold']],
                ], 422);
            }
            $updateData['sell_date'] = Carbon::now()->toDateString();
            $updateData['buyer_name'] = $request->input('buyer_name');
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


}
