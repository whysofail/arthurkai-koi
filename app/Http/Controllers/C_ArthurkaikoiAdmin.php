<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Koi;

// Admin Master
use App\Models\History;
use App\Models\Variety;
use App\Models\Bloodline;
use App\Models\Breeder;
use App\Models\Agent;
use App\Models\HandlingAgent;

// Admin Website
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\News;
use App\Models\OurCollection;
use App\Enums\PostType;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Log;



class C_ArthurkaikoiAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $koi = Koi::count();
        $variety = Variety::count();
        $bloodline = Bloodline::count();
        $breeder = Breeder::count();
        $agent = Agent::count();
        return view('arthurkaikoiadmin.homemenu', compact('koi', 'variety', 'bloodline', 'breeder', 'agent'));
    }

    ### KOI ###
    public function koi(Request $request)
    {
        // Get the layout, search query, pagination count, key-value filters, and sorting options
        $layout = $request->query('layout', 'list');
        $search = $request->query('search');
        $perPage = $request->query('per_page', 8); // Default to 8 items per page
        $filters = $request->query('filters', []);
        $value = $request->query('value'); // Filter value
        $sortby = $request->query('sort_by'); // Sorting key
        $order = $request->query('order', 'asc'); // Default to ascending order

        // Validate layout
        $validLayouts = ['list', 'grid'];
        $layout = in_array($layout, $validLayouts) ? $layout : 'list';

        $koitotal = Koi::count();
        $koiQuery = Koi::query();

        // Apply search filters if search term is provided
        if ($search) {
            $this->applySearchFilters($koiQuery, $search);
        }

        // Apply key-value filters if both key and value are provided
        if ($filters) {
            foreach ($filters as $filter) {
                if (isset($filter['key']) && isset($filter['value'])) {
                    $this->applyKeyValueFilters($koiQuery, $filter['key'], $filter['value']);
                }
            }
        }
        // Apply ordering if sortby and order are provided
        if ($sortby && $order) {
            $this->applyOrdering($koiQuery, $sortby, $order);
        }
        // Paginate the results based on layout and per-page selection
        if ($layout === 'list') {
            $koi = $koiQuery->get();
            return view('arthurkaikoiadmin.dashboard', compact('koitotal', 'koi', 'layout', 'perPage'));
        } else {
            // Conditionally apply 'latest()' if no search, key-value filters, or sorting are applied
            if (!$search && !$filters && !$value && !$sortby) {
                $koiQuery->orderBy('koi.updated_at', 'desc');
            }
            // return dd($koiQuery->toSql());
            // Apply pagination with appends for query parameters
            $koi = $koiQuery->paginate($perPage)->appends([
                'layout' => $layout,
                'search' => $search,
                'per_page' => $perPage,
                'filter' => $filters,
                'value' => $value,
                'sort_by' => $sortby,
                'order' => $order
            ]);


            return view('arthurkaikoiadmin.koi.koi_grid', compact('koitotal', 'koi', 'layout', 'search', 'perPage'));
        }
    }


    private function applySearchFilters($query, $search)
    {
        $searchTerms = array_map('trim', explode(',', strtolower($search)));

        $query->where(function ($subQuery) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $subQuery->orWhere(function ($q) use ($term) {
                    $this->addSearchConditions($q, $term);
                });
            }
        });

        foreach ($searchTerms as $term) {
            $query->orderByRaw("LOWER((SELECT name FROM variety WHERE variety.id = koi.variety_id)) LIKE ? DESC", ["%$term%"]);
        }
    }


    private function addSearchConditions($query, $term)
    {
        // Ensure the placeholder is correctly used with one parameter passed
        $query->whereRaw('LOWER(code) LIKE ?', ["%$term%"])
            ->orWhereRaw('LOWER(nickname) LIKE ?', ["%$term%"])
            ->orWhereRaw('LOWER(seller) LIKE ?', ["%$term%"])
            ->orWhereRaw('LOWER(handler) LIKE ?', ["%$term%"])
            ->orWhereHas('variety', function ($q) use ($term) {
                $this->addRelatedSearchConditions($q, $term);
            })
            ->orWhereHas('breeder', function ($q) use ($term) {
                $this->addRelatedSearchConditions($q, $term);
            })
            ->orWhereHas('bloodline', function ($q) use ($term) {
                $this->addRelatedSearchConditions($q, $term);
            });
        // return dd($query->toSql());
    }


    private function addRelatedSearchConditions($query, $term)
    {
        $query->whereRaw('LOWER(name) LIKE ?', ["%$term%"]);
        // ->orWhereRaw('LOWER(code) LIKE ?', ["%$term%"]);
    }

    public function applyKeyValueFilters($query, $key, $value)
    {
        $relatedColumns = ['variety', 'breeder', 'bloodline'];

        // Check if the key is in related columns and apply the respective filter
        $query->where(function ($subQuery) use ($key, $value, $relatedColumns) {
            if (in_array($key, $relatedColumns)) {
                $subQuery->whereHas($key, function ($q) use ($value) {
                    $this->addRelatedKeyValueConditions($q, $value);
                });
            } else {
                // Apply raw filtering if not a related column
                $subQuery->whereRaw("LOWER($key) LIKE ?", ["%$value%"]);
            }
        });
    }




    private function addRelatedKeyValueConditions($query, $value)
    {
        $query->whereRaw("LOWER(name) LIKE ?", ["%$value%"])
            ->orWhereRaw("LOWER(code) LIKE ?", ["%$value%"]);
    }

    private function applyOrdering($query, $key, $order)
    {
        // Define the valid related columns (models) for joining
        $relatedColumns = ['variety', 'breeder', 'bloodline'];

        // Ensure order is either 'asc' or 'desc'
        $order = strtolower($order) === 'desc' ? 'desc' : 'asc';

        // Check if the ordering is based on a related model
        if (in_array($key, $relatedColumns)) {
            // Apply left join to the related table using the given key (e.g. 'variety', 'breeder', etc.)
            $query->join($key, "{$key}.id", '=', "koi.{$key}_id")
                // Explicitly select the columns from both koi and the related table
                ->select('koi.*', "{$key}.name as {$key}_name", "{$key}.code as {$key}_code")
                // Apply ordering based on the related column
                ->orderBy("{$key}.name", $order);
        } else {
            // For columns in the 'koi' table, apply direct ordering
            $query->orderBy(DB::raw("koi.{$key}"), $order);
        }

        // Explicitly order by 'updated_at' from the koi table to avoid ambiguity
        // $query->orderBy("koi.updated_at", $order);
    }




    public function getDataKoi(Request $request)
    {
        // Columns mapping
        $columns = [
            0 => 'id',
            1 => 'action',
            2 => 'photo',
            3 => 'code',
            4 => 'nickname',
            5 => 'variety',
            6 => 'bloodline',
            7 => 'breeder',
            8 => 'gender',
            9 => 'birthdate',
            10 => 'age',
            11 => 'purchase_date',
            12 => 'size',
            13 => 'seller',
            14 => 'handler',
            15 => 'price_buy',
            16 => 'price_sell',
            17 => 'location',
            18 => 'date_of_sell',
            19 => 'buyer_name',
            20 => 'date_of_death',
            21 => 'death_note',
            22 => 'photo_pdf',
        ];

        $totalData = Koi::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDir = $request->input('order.0.dir');
        $orderColumn = $columns[$orderColumnIndex];

        // Handle dynamic ordering for variety and price columns
        switch ($orderColumn) {
            case 'variety':
                $order = 'variety.name';
                break;
            case 'breeder':
                $order = 'breeder.name';
                break;
            case 'price_buy':
                $order = ['koi.price_buy_idr', 'koi.price_buy_jpy'];
                break;
            case 'price_sell':
                $order = ['koi.price_sell_idr', 'koi.price_sell_jpy'];
                break;
            default:
                $order = "koi.$orderColumn";
                break;
        }

        // Initial query for filtering
        $query = Koi::select('koi.*')
            ->leftJoin('variety', 'koi.variety_id', '=', 'variety.id')
            ->leftJoin('breeder', 'koi.breeder_id', '=', 'breeder.id')
            ->with(['history', 'breeder', 'variety']);

        // Search filter
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($search) {
                $query->where('koi.code', 'LIKE', "%{$search}%")
                    ->orWhere('koi.nickname', 'LIKE', "%{$search}%")
                    ->orWhere('koi.gender', 'LIKE', "%{$search}%")
                    ->orWhereHas('variety', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        // Count filtered results before applying pagination
        $totalFiltered = $query->count();

        // Apply ordering logic
        if (is_array($order)) {
            foreach ($order as $col) {
                $query->orderBy($col, $orderDir);
            }
        } else {
            $query->orderBy($order, $orderDir);
        }

        // Apply pagination
        $kois = $query->offset($start)->limit($limit)->get();

        // Prepare the data for the response
        $data = [];
        if (!empty($kois)) {
            foreach ($kois as $index => $koi) {
                $nestedData['index'] = $start + $index + 1;
                $nestedData['id'] = $koi->id;
                $nestedData['action'] = view('partials.koi_actions', ['k' => $koi])->render();
                $photos = explode('|', $koi->photo); // Split the photo string into an array
                $firstPhoto = $photos[0] ?? null;
                $nestedData['photo'] = !empty($photos)
                    ? '<img src="' . asset('img/koi/photo/' . htmlspecialchars($firstPhoto)) . '" class="img-fluid" alt="Koi Photo" />'
                    : null; // Get the first photo safely

                $nestedData['code'] = $koi->code;
                $nestedData['nickname'] = $koi->nickname ?? null;
                $nestedData['variety'] = optional($koi->variety)->name ?? null;
                $nestedData['gender'] = $koi->gender;
                $nestedData['birth'] = $koi->birthdate;
                if ($koi->birthdate) {
                    $birthDate = Carbon::createFromFormat('Y-m-d', $koi->birthdate);
                    $now = Carbon::now();
                    $age = $birthDate->diff($now);
                    $nestedData['age'] = $age->y . 'yr ' . $age->m . 'm ';
                } else {
                    $nestedData['age'] = '';
                }
                $nestedData['purchase_date'] = $koi->purchase_date;
                $nestedData['size'] = $koi->size ?? '';
                $nestedData['seller'] = $koi->seller;
                $nestedData['handler'] = $koi->handler;
                $nestedData['price_buy'] = 'IDR: ' . number_format($koi->price_buy_idr ?? 0, 0, ',', '.') . '<br>' .
                    'JPY: ' . number_format($koi->price_buy_jpy ?? 0, 0, ',', '.');
                $nestedData['price_sell'] = 'IDR: ' . number_format($koi->price_sell_idr ?? 0, 0, ',', '.') . '<br>' .
                    'JPY: ' . number_format($koi->price_sell_jpy ?? 0, 0, ',', '.');
                $nestedData['location'] = $koi->location;
                $nestedData['date_of_sell'] = $koi->sell_date;
                $nestedData['buyer_name'] = $koi->buyer_name;
                $nestedData['date_of_death'] = $koi->date_of_death;
                $nestedData['death_note'] = $koi->death_note;
                $nestedData['breeder'] = optional($koi->breeder)->name ?? '';
                $nestedData['bloodline'] = optional($koi->bloodline)->name ?? '';
                if ($firstPhoto) {
                    $imagePath = public_path('img/koi/photo/' . htmlspecialchars($firstPhoto));
                    if (file_exists($imagePath)) {
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $mimeType = mime_content_type($imagePath);
                        $nestedData['photo_pdf'] = 'data:' . $mimeType . ';base64,' . $imageData;
                    } else {
                        $nestedData['photo_pdf'] = null;
                    }
                } else {
                    $nestedData['photo_pdf'] = null;
                }
                $data[] = $nestedData;
            }
        }

        // JSON response
        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }



    public function getDataKoiZA(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'action',
            2 => 'koi_code',
            3 => 'history_year',
            4 => 'nickname',
            5 => 'variety',
            6 => 'gender',
            7 => 'birth',
            8 => 'age',
            9 => 'date_purchese',
            10 => 'size',
            11 => 'salleragent',
            12 => 'handling_agent',
            13 => 'pricebuy_idr',
            14 => 'pricebuy_jpy',
            15 => 'kep_loc',
            16 => 'sell_price_idr',
            17 => 'sell_price_jpy',
            18 => 'date_of_sell',
            19 => 'buyer_name',
            20 => 'date_of_death',
            21 => 'death_note',
            22 => 'breeder',
            23 => 'bloodline'
        ];

        $totalData = Koi::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $kois = Koi::with('history')
                ->offset($start)
                ->limit($limit)
                ->orderBy('koi_code', 'desc')
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $kois = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->count();
        }

        $data = [];
        if (!empty($kois)) {
            foreach ($kois as $index => $koi) {
                foreach ($koi->history as $history) {
                    $nestedData['index'] = $start + $index + 1;
                    $nestedData['id_koi'] = $koi->id;
                    $nestedData['action'] = view('partials.koi_actions', ['k' => $koi])->render();
                    $nestedData['koi_code'] = $koi->koi_code;
                    $nestedData['nickname'] = $koi->nickname;
                    $nestedData['variety'] = $koi->variety;
                    $nestedData['gender'] = $koi->gender;
                    $nestedData['birth'] = $koi->birth;
                    // Calculate the age using Carbon
                    if ($koi->birth) {
                        $birthDate = Carbon::createFromFormat('Y-m', $koi->birth);
                        $now = Carbon::now();
                        $age = $birthDate->diff($now);
                        $umurTahun = $age->y;
                        $umurBulan = $age->m;
                        $nestedData['age'] = $umurTahun . 'yr ' . $umurBulan . 'm ';
                    } else {
                        $nestedData['age'] = '-';
                    }
                    $nestedData['date_purchese'] = $koi->date_purchese;
                    $nestedData['size'] = $history->size;
                    $nestedData['salleragent'] = $koi->salleragent;
                    $nestedData['handling_agent'] = $history->handling_agent;
                    $nestedData['pricebuy_idr'] = $koi->pricebuy_idr;
                    $nestedData['pricebuy_jpy'] = $koi->pricebuy_jpy;
                    $nestedData['kep_loc'] = $koi->kep_loc;
                    $nestedData['sell_price_idr'] = $history->sell_price_idr;
                    $nestedData['sell_price_jpy'] = $history->sell_price_jpy;
                    $nestedData['date_of_sell'] = $history->date_of_sell;
                    $nestedData['buyer_name'] = $history->buyer_name;
                    $nestedData['date_of_death'] = $history->date_of_death;
                    $nestedData['death_note'] = $history->death_note;
                    $nestedData['breeder'] = $koi->breeder;
                    $nestedData['bloodline'] = $koi->bloodline;

                    $data[] = $nestedData;
                }
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }

    public function getDataKoi19(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'action',
            2 => 'koi_code',
            3 => 'history_year',
            4 => 'nickname',
            5 => 'variety',
            6 => 'gender',
            7 => 'birth',
            8 => 'age',
            9 => 'date_purchese',
            10 => 'size',
            11 => 'salleragent',
            12 => 'handling_agent',
            13 => 'pricebuy_idr',
            14 => 'pricebuy_jpy',
            15 => 'kep_loc',
            16 => 'sell_price_idr',
            17 => 'sell_price_jpy',
            18 => 'date_of_sell',
            19 => 'buyer_name',
            20 => 'date_of_death',
            21 => 'death_note',
            22 => 'breeder',
            23 => 'bloodline'
        ];

        $totalData = Koi::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $kois = Koi::with('history')
                ->offset($start)
                ->limit($limit)
                ->orderBy('koi_code', 'asc')
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $kois = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->count();
        }

        $data = [];
        if (!empty($kois)) {
            foreach ($kois as $index => $koi) {
                foreach ($koi->history as $history) {
                    $nestedData['index'] = $start + $index + 1;
                    $nestedData['id_koi'] = $koi->id;
                    $nestedData['action'] = view('partials.koi_actions', ['k' => $koi])->render();
                    $nestedData['koi_code'] = $koi->koi_code;
                    $nestedData['history_year'] = $history->year;
                    $nestedData['nickname'] = $koi->nickname;
                    $nestedData['variety'] = $koi->variety;
                    $nestedData['gender'] = $koi->gender;
                    $nestedData['birth'] = $koi->birth;
                    // Calculate the age using Carbon
                    if ($koi->birth) {
                        $birthDate = Carbon::createFromFormat('Y-m', $koi->birth);
                        $now = Carbon::now();
                        $age = $birthDate->diff($now);
                        $umurTahun = $age->y;
                        $umurBulan = $age->m;
                        $nestedData['age'] = $umurTahun . 'yr ' . $umurBulan . 'm ';
                    } else {
                        $nestedData['age'] = '-';
                    }
                    $nestedData['date_purchese'] = $koi->date_purchese;
                    $nestedData['size'] = $history->size;
                    $nestedData['salleragent'] = $koi->salleragent;
                    $nestedData['handling_agent'] = $history->handling_agent;
                    $nestedData['pricebuy_idr'] = $koi->pricebuy_idr;
                    $nestedData['pricebuy_jpy'] = $koi->pricebuy_jpy;
                    $nestedData['kep_loc'] = $koi->kep_loc;
                    $nestedData['sell_price_idr'] = $history->sell_price_idr;
                    $nestedData['sell_price_jpy'] = $history->sell_price_jpy;
                    $nestedData['date_of_sell'] = $history->date_of_sell;
                    $nestedData['buyer_name'] = $history->buyer_name;
                    $nestedData['date_of_death'] = $history->date_of_death;
                    $nestedData['death_note'] = $history->death_note;
                    $nestedData['breeder'] = $koi->breeder;
                    $nestedData['bloodline'] = $koi->bloodline;

                    $data[] = $nestedData;
                }
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }

    public function getDataKoi91(Request $request)
    {
        $columns = [
            0 => 'id_koi',
            1 => 'action',
            2 => 'koi_code',
            3 => 'history_year',
            4 => 'nickname',
            5 => 'variety',
            6 => 'gender',
            7 => 'birth',
            8 => 'age',
            9 => 'date_purchese',
            10 => 'size',
            11 => 'salleragent',
            12 => 'handling_agent',
            13 => 'pricebuy_idr',
            14 => 'pricebuy_jpy',
            15 => 'kep_loc',
            16 => 'sell_price_idr',
            17 => 'sell_price_jpy',
            18 => 'date_of_sell',
            19 => 'buyer_name',
            20 => 'date_of_death',
            21 => 'death_note',
            22 => 'breeder',
            23 => 'bloodline'
        ];

        $totalData = Koi::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $kois = Koi::with('history')
                ->offset($start)
                ->limit($limit)
                ->orderBy('koi_code', 'desc')
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $kois = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->count();
        }

        $data = [];
        if (!empty($kois)) {
            foreach ($kois as $index => $koi) {
                foreach ($koi->history as $history) {
                    $nestedData['index'] = $start + $index + 1;
                    $nestedData['id_koi'] = $koi->id;
                    $nestedData['action'] = view('partials.koi_actions', ['k' => $koi])->render();
                    $nestedData['koi_code'] = $koi->koi_code;
                    $nestedData['history_year'] = $history->year;
                    $nestedData['nickname'] = $koi->nickname;
                    $nestedData['variety'] = $koi->variety;
                    $nestedData['gender'] = $koi->gender;
                    $nestedData['birth'] = $koi->birth;
                    // Calculate the age using Carbon
                    if ($koi->birth) {
                        $birthDate = Carbon::createFromFormat('Y-m', $koi->birth);
                        $now = Carbon::now();
                        $age = $birthDate->diff($now);
                        $umurTahun = $age->y;
                        $umurBulan = $age->m;
                        $nestedData['age'] = $umurTahun . 'yr ' . $umurBulan . 'm ';
                    } else {
                        $nestedData['age'] = '-';
                    }
                    $nestedData['date_purchese'] = $koi->date_purchese;
                    $nestedData['size'] = $history->size;
                    $nestedData['salleragent'] = $koi->salleragent;
                    $nestedData['handling_agent'] = $history->handling_agent;
                    $nestedData['pricebuy_idr'] = $koi->pricebuy_idr;
                    $nestedData['pricebuy_jpy'] = $koi->pricebuy_jpy;
                    $nestedData['kep_loc'] = $koi->kep_loc;
                    $nestedData['sell_price_idr'] = $history->sell_price_idr;
                    $nestedData['sell_price_jpy'] = $history->sell_price_jpy;
                    $nestedData['date_of_sell'] = $history->date_of_sell;
                    $nestedData['buyer_name'] = $history->buyer_name;
                    $nestedData['date_of_death'] = $history->date_of_death;
                    $nestedData['death_note'] = $history->death_note;
                    $nestedData['breeder'] = $koi->breeder;
                    $nestedData['bloodline'] = $koi->bloodline;

                    $data[] = $nestedData;
                }
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }

    public function getDataKoiHigh(Request $request)
    {
        $columns = [
            0 => 'id_koi',
            1 => 'action',
            2 => 'koi_code',
            3 => 'history_year',
            4 => 'nickname',
            5 => 'variety',
            6 => 'gender',
            7 => 'birth',
            8 => 'age',
            9 => 'date_purchese',
            10 => 'size',
            11 => 'salleragent',
            12 => 'handling_agent',
            13 => 'pricebuy_idr',
            14 => 'pricebuy_jpy',
            15 => 'kep_loc',
            16 => 'sell_price_idr',
            17 => 'sell_price_jpy',
            18 => 'date_of_sell',
            19 => 'buyer_name',
            20 => 'date_of_death',
            21 => 'death_note',
            22 => 'breeder',
            23 => 'bloodline'
        ];

        $totalData = Koi::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $kois = Koi::with('history')
                ->offset($start)
                ->limit($limit)
                ->orderBy('pricebuy_idr', 'desc')
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $kois = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->count();
        }

        $data = [];
        if (!empty($kois)) {
            foreach ($kois as $index => $koi) {
                foreach ($koi->history as $history) {
                    $nestedData['index'] = $start + $index + 1;
                    $nestedData['id_koi'] = $koi->id;
                    $nestedData['action'] = view('partials.koi_actions', ['k' => $koi])->render();
                    $nestedData['koi_code'] = $koi->koi_code;
                    $nestedData['history_year'] = $history->year;
                    $nestedData['nickname'] = $koi->nickname;
                    $nestedData['variety'] = $koi->variety;
                    $nestedData['gender'] = $koi->gender;
                    $nestedData['birth'] = $koi->birth;
                    // Calculate the age using Carbon
                    if ($koi->birth) {
                        $birthDate = Carbon::createFromFormat('Y-m', $koi->birth);
                        $now = Carbon::now();
                        $age = $birthDate->diff($now);
                        $umurTahun = $age->y;
                        $umurBulan = $age->m;
                        $nestedData['age'] = $umurTahun . 'yr ' . $umurBulan . 'm ';
                    } else {
                        $nestedData['age'] = '-';
                    }
                    $nestedData['date_purchese'] = $koi->date_purchese;
                    $nestedData['size'] = $history->size;
                    $nestedData['salleragent'] = $koi->salleragent;
                    $nestedData['handling_agent'] = $history->handling_agent;
                    $nestedData['pricebuy_idr'] = $koi->pricebuy_idr;
                    $nestedData['pricebuy_jpy'] = $koi->pricebuy_jpy;
                    $nestedData['kep_loc'] = $koi->kep_loc;
                    $nestedData['sell_price_idr'] = $history->sell_price_idr;
                    $nestedData['sell_price_jpy'] = $history->sell_price_jpy;
                    $nestedData['date_of_sell'] = $history->date_of_sell;
                    $nestedData['buyer_name'] = $history->buyer_name;
                    $nestedData['date_of_death'] = $history->date_of_death;
                    $nestedData['death_note'] = $history->death_note;
                    $nestedData['breeder'] = $koi->breeder;
                    $nestedData['bloodline'] = $koi->bloodline;

                    $data[] = $nestedData;
                }
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }

    public function getDataKoiLow(Request $request)
    {
        $columns = [
            0 => 'id_koi',
            1 => 'action',
            2 => 'koi_code',
            3 => 'history_year',
            4 => 'nickname',
            5 => 'variety',
            6 => 'gender',
            7 => 'birth',
            8 => 'age',
            9 => 'date_purchese',
            10 => 'size',
            11 => 'salleragent',
            12 => 'handling_agent',
            13 => 'pricebuy_idr',
            14 => 'pricebuy_jpy',
            15 => 'kep_loc',
            16 => 'sell_price_idr',
            17 => 'sell_price_jpy',
            18 => 'date_of_sell',
            19 => 'buyer_name',
            20 => 'date_of_death',
            21 => 'death_note',
            22 => 'breeder',
            23 => 'bloodline'
        ];

        $totalData = Koi::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $kois = Koi::with('history')
                ->offset($start)
                ->limit($limit)
                ->orderBy('pricebuy_idr', 'asc')
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $kois = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Koi::with('history')
                ->where('koi_code', 'LIKE', "%{$search}%")
                ->orWhere('nickname', 'LIKE', "%{$search}%")
                ->orWhere('variety', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                // Add other search fields as necessary
                ->count();
        }

        $data = [];
        if (!empty($kois)) {
            foreach ($kois as $index => $koi) {
                foreach ($koi->history as $history) {
                    $nestedData['index'] = $start + $index + 1;
                    $nestedData['id_koi'] = $koi->id;
                    $nestedData['action'] = view('partials.koi_actions', ['k' => $koi])->render();
                    $nestedData['koi_code'] = $koi->koi_code;
                    $nestedData['history_year'] = $history->year;
                    $nestedData['nickname'] = $koi->nickname;
                    $nestedData['variety'] = $koi->variety;
                    $nestedData['gender'] = $koi->gender;
                    $nestedData['birth'] = $koi->birth;
                    // Calculate the age using Carbon
                    if ($koi->birth) {
                        $birthDate = Carbon::createFromFormat('Y-m', $koi->birth);
                        $now = Carbon::now();
                        $age = $birthDate->diff($now);
                        $umurTahun = $age->y;
                        $umurBulan = $age->m;
                        $nestedData['age'] = $umurTahun . 'yr ' . $umurBulan . 'm ';
                    } else {
                        $nestedData['age'] = '-';
                    }
                    $nestedData['date_purchese'] = $koi->date_purchese;
                    $nestedData['size'] = $history->size;
                    $nestedData['salleragent'] = $koi->salleragent;
                    $nestedData['handling_agent'] = $history->handling_agent;
                    $nestedData['pricebuy_idr'] = $koi->pricebuy_idr;
                    $nestedData['pricebuy_jpy'] = $koi->pricebuy_jpy;
                    $nestedData['kep_loc'] = $koi->kep_loc;
                    $nestedData['sell_price_idr'] = $history->sell_price_idr;
                    $nestedData['sell_price_jpy'] = $history->sell_price_jpy;
                    $nestedData['date_of_sell'] = $history->date_of_sell;
                    $nestedData['buyer_name'] = $history->buyer_name;
                    $nestedData['date_of_death'] = $history->date_of_death;
                    $nestedData['death_note'] = $history->death_note;
                    $nestedData['breeder'] = $koi->breeder;
                    $nestedData['bloodline'] = $koi->bloodline;
                    $data[] = $nestedData;
                }
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }


    public function koigrid()
    {
        $koitotal = Koi::count();
        $koi = koi::latest()->paginate(8);
        return view('arthurkaikoiadmin.koi.koi_grid', compact('koitotal', 'koi'));
    }

    public function koigridsearch(request $request)
    {
        $koitotal = Koi::count();
        $search = $request->search;
        $koi = Koi::where('variety', 'like', "%" . $search . "%")
            ->orWhere('koi_code', 'like', "%" . $search . "%")
            ->orWhere('bloodline', 'like', "%" . $search . "%")
            ->orWhere('variety', 'like', "%" . $search . "%")
            ->orWhere('breeder', 'like', "%" . $search . "%")
            ->orWhere('gender', 'like', "%" . $search . "%")
            ->orWhere('n_status', 'like', "%" . $search . "%")
            ->get();
        return view('arthurkaikoiadmin.koi.koi_grid_search', compact('koitotal', 'koi'));
    }

    public function koidetail($id)
    {
        $koi = Koi::with('history')->where('id', $id)->first();
        // return response()->json($koi);
        $entryUrl = $request->entryUrl ?? url()->previous();


        return view('arthurkaikoiadmin.koi.koi_detail', compact('koi', 'entryUrl'));
    }

    public function koidetailgrid($id)
    {
        $koi = Koi::where('id', $id)->get();
        return view('arthurkaikoiadmin.koi.koi_detail_grid', compact('koi'));
    }

    public function koiadd()
    {
        $variety = Variety::all();
        $bloodline = Bloodline::all();
        $breeder = Breeder::all();
        $agent = Agent::all();

        return view('arthurkaikoiadmin.koi.koi_add', compact('variety', 'bloodline', 'breeder', 'agent'));
    }

    public function getyear(Request $request)
    {
        $koi_id = $request->input('koi_id');
        $year = $request->input('year');
        $history = History::where('koi_id', $koi_id)->where('year', $year)->get();

        return response()->json($history);
    }

    public function koigadd()
    {
        $variety = Variety::all();
        $bloodline = Bloodline::all();
        $breeder = Breeder::all();
        $agent = Agent::all();
        return view('arthurkaikoiadmin.koi.koig_add', compact('variety', 'bloodline', 'breeder', 'agent'));
    }


    public function parseDate($date, $format = 'M Y')
    {
        if ($date === ' ') {
            return null;
        } else {
            return $date ? Carbon::createFromFormat($format, $date)->startOfMonth() : null;
        }
    }

    public function koistore(Request $request)
    {

        $request->validate([
            'variety' => ['required'],
            'breeder' => ['required'],
        ]);

        $purchaseDate = $request->purchase_date ? Carbon::createFromFormat('Y-m', $request->purchase_date)->format('my') : null;

        // Retrieve related models
        $variety = Variety::find($request->variety);
        $breeder = Breeder::find($request->breeder);

        // Generate koi code
        $sequence = $this->generateSequence($variety, $breeder, $purchaseDate);
        $koiCode = $variety->code . $breeder->code . ($purchaseDate != '' ? $purchaseDate : '0000') . $sequence;
        // return dd($koiCode);
        // Handle file uploads
        $image = $this->handleFileUploads($request->file('link_photo'), 'img/koi/photo');
        $imagev = $this->handleFileUploads($request->file('link_video'), 'img/koi/video');
        $link_trophys = $this->handleSingleFileUpload($request->file('link_trophy'), 'img/koi/trophy');
        $link_certificates = $this->handleSingleFileUpload($request->file('link_certificate'), 'img/koi/certificate');
        // Create Koi record    
        $koi = Koi::create([
            'code' => $koiCode,
            'nickname' => $request->nickname,
            'variety_id' => $request->variety,
            'breeder_id' => $request->breeder,
            'bloodline_id' => is_string($request->bloodline) ? 1 : $request->bloodline,
            'sequence' => $sequence,
            'size' => $request->size,
            'birthdate' => $request->birth ? Carbon::createFromFormat('Y-m', $request->birth)->startOfMonth() : null,
            'gender' => $request->gender,
            'purchase_date' => $request->purchase_date ? Carbon::createFromFormat('Y-m', $request->purchase_date)->startOfMonth() : null,
            'seller' => $request->seller ?? '',
            'handler' => $request->handler ?? '',
            'price_buy_idr' => $request->pricebuy_idr ? (int) $request->pricebuy_idr : 0,
            'price_buy_jpy' => $request->pricebuy_jpy ? (int) $request->pricebuy_jpy : 0,
            'price_sell_idr' => $request->pricesell_idr ? (int) $request->pricesell_idr : 0,
            'price_sell_jpy' => $request->pricesell_jpy ? (int) $request->pricesell_jpy : 0,
            'location' => $request->location,
            'photo' => implode('|', $image),
            'video' => implode('|', $imagev),
            'trophy' => $link_trophys,
            'certificate' => $link_certificates,
            'status' => $request->status,
        ]);
        return redirect('/CMS/koi/detail/' . $koi->id);
    }

    /**
     * Generate the sequence for the Koi code.
     */
    private function generateSequence($variety, $breeder, $purchaseDate)
    {
        $koiCodeInput = $variety->code . $breeder->code . $purchaseDate;
        // Find the highest sequence that matches the koi code pattern and is not null
        $existingKoi = Koi::where('code', 'like', $koiCodeInput . '%')
            ->whereNotNull('sequence')
            ->orderBy('sequence', 'desc')
            ->first();

        // If a sequence is found, increment it; otherwise, start from '00001'
        $newSequence = $existingKoi ? $existingKoi->sequence + 1 : 1;

        // Format sequence with leading zeros to ensure a 5-digit string
        return str_pad($newSequence, 5, '0', STR_PAD_LEFT);
    }


    /**
     * Handle multiple file uploads.
     */
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




    public function koigstore(request $request)
    {

        $mmyy = Carbon::createFromFormat('Y-m', $request->date_purchese);
        $date_purchese = $mmyy->format('my');
        $code_variety = Variety::where('variety_name', $request->variety)->first();
        $variety = $code_variety->variety_code;
        $code_breeder = Breeder::where('breeder_name', $request->breeder)->first();
        $breeder = $code_breeder->breeder_code;

        $sequence_awal = '00001';

        $code_koi_fill = $variety . $breeder . $date_purchese . $sequence_awal;

        $koi_code_where = koi::where('koi_code', $code_koi_fill)->first();

        // Jika kode koi belum ada dalam database
        if ($koi_code_where == null) {
            $sequence = '00001';
        } else {
            // Jika kode koi sudah ada dalam database
            // Periksa apakah semua entitas sebelumnya memiliki nilai yang sama untuk variety, breeder, dan date_purchese
            $previous_kois = Koi::where('code_variety', $variety)
                ->orWhere('code_breeder', $breeder)
                ->orWhere('code_purchasedate', $date_purchese)
                ->orderBy('code_sequence', 'desc')
                ->get();

            if ($previous_kois->isEmpty()) {
                // Jika tidak ada entitas sebelumnya yang memiliki nilai yang sama
                $sequence = '00001';
            } else {
                // Jika ada entitas sebelumnya yang memiliki nilai yang sama
                // Periksa nomor urutan terakhir
                $last_sequence = intval($previous_kois->first()->code_sequence);
                $next_sequence = $last_sequence + 1;
                $sequence = str_pad($next_sequence, 5, '0', STR_PAD_LEFT);
            }
        }

        $code_koi = $variety . $breeder . $date_purchese . $sequence;


        $image = array();
        if ($files = $request->file('link_photo')) {
            foreach ($files as $file) {
                $link_photos = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'img/koi/photo';
                $image_url = $link_photos;
                $file->move($tujuan_upload, $link_photos);
                $image[] = $image_url;
            }
        } else if ($request->file('link_photo') == null) {
            $image[] = '';
        } else {
            $image[] = '';
        }

        // $imageh = array();
        // if($files = $request->file('photo_highlight')){
        //   foreach ($files as $file){
        //     $photo_highlights = time()."_".$file->getClientOriginalName();
        //     $tujuan_upload = 'img/koi/photo_highlight';
        //     $imageh_url = $photo_highlights;
        //     $file->move($tujuan_upload,$photo_highlights);
        //     $imageh[] = $imageh_url;
        //   }
        // }
        // else if($request->file('photo_highlight') == null)
        // {
        //     $imageh[] = '';
        // }
        // else{
        //     $imageh[] = '';
        // }

        $imagev = array();
        if ($files = $request->file('link_video')) {
            foreach ($files as $file) {
                $link_videos = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'img/koi/video';
                $image_url = $link_videos;
                $file->move($tujuan_upload, $link_videos);
                $imagev[] = $image_url;
            }
        } else if ($request->file('link_video') == null) {
            $imagev[] = '';
        } else {
            $imagev[] = '';
        }

        if ($request->file('link_trophy') != null) {
            $link_trophy = $request->file('link_trophy');
            $link_trophys = time() . "_" . $link_trophy->getClientOriginalName();
            $tujuan_upload = 'img/koi/trophy';
            $link_trophy->move($tujuan_upload, $link_trophys);
        } else {
            $link_trophys = '';
        }

        if ($request->file('link_certificate') != null) {
            $link_certificate = $request->file('link_certificate');
            $link_certificates = time() . "_" . $link_certificate->getClientOriginalName();
            $tujuan_upload = 'img/koi/certificate';
            $link_certificate->move($tujuan_upload, $link_certificates);
        } else {
            $link_certificates = '';
        }


        $koi = Koi::create([
            'koi_code' => $code_koi,
            'code_variety' => $variety,
            'code_breeder' => $breeder,
            'code_purchasedate' => $date_purchese,
            'code_sequence' => $sequence,
            'nickname' => $request->nickname,
            'variety' => $request->variety,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'date_purchese' => $request->date_purchese,
            'salleragent' => $request->salleragent,
            'pricebuy_idr' => $request->pricebuy_idr,
            'pricebuy_jpy' => $request->pricebuy_jpy,
            'breeder' => $request->breeder,
            'bloodline' => $request->bloodline,
            'year' => $request->year,
            'n_status' => $request->n_status,
        ]);

        History::create([
            'koi_id' => $koi->id,
            'year' => $request->year,
            'age' => $request->age,
            'size' => $request->size,
            'hagent' => $request->hagent,
            'kep_loc' => $request->kep_loc,
            'link_photo' => implode('|', $image),
            'link_video' => implode('|', $imagev),
            'link_trophy' => $link_trophys,
            'name_trophy' => $request->name_trophys,
            'link_certificate' => $link_certificates,
            'name_certificate' => $request->name_certificate,
            'pricesell_idr' => $request->pricesell_idr,
            'pricesell_jpy' => $request->pricesell_jpy,
            'buyer_name' => $request->buyer_name,
            'death_date' => $request->death_date,
            'death_note' => $request->death_note,
        ]);

        return redirect('/CMS/koi/grid');
    }

    public function koiuploads(Request $request)
    {
        $path = storage_path('tmp/uploads');

        // !file_exists($path)) && mkdir($path, 0777, true);

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function koiedit(Request $request, $id)
    {
        $koi = Koi::with('breeder', 'variety', 'bloodline')->where('id', $id)->get();
        $variety = Variety::all();
        $bloodline = Bloodline::all();
        $breeder = Breeder::all();
        $agent = Agent::all();
        $sequence = Koi::where('id', $id)->get();
        $olds = $request->old();
        $entryUrl = $request->entryUrl ?? url()->previous();

        return view('arthurkaikoiadmin.koi.koi_edit', compact('koi', 'variety', 'bloodline', 'breeder', 'agent', 'sequence', 'olds', 'entryUrl'));
    }

    public function koigedit($id)
    {
        $koi = Koi::where('id_koi', $id)->get();
        $variety = Variety::all();
        $bloodline = Bloodline::all();
        $breeder = Breeder::all();
        $agent = Agent::all();
        return view('arthurkaikoiadmin.koi.koig_edit', compact('koi', 'variety', 'bloodline', 'breeder', 'agent'));
    }

    public function koiretweet($id)
    {
        $koi = Koi::where('id_koi', $id)->get();
        return view('arthurkaikoiadmin.koi.koi_retweet', compact('koi'));
    }
    public function koiupdate(Request $request)
    {

        // Fetch the existing Koi record
        $koi = Koi::findOrFail($request->id);
        // Retrieve and format current photos
        $currentPhotos = array_filter(explode('|', trim($koi->photo))); // Trim whitespace and remove empty elements
        $updatedPhotos = $currentPhotos; // Start with existing 

        $currentVideos = array_filter(explode('|', trim($koi->video))); // Trim whitespace and remove empty elements
        $updatedVideos = $currentVideos; // Start with existing 


        // Handle new file uploads
        $newPhotos = $this->handleFileUploads($request->file('link_photo'), 'img/koi/photo');
        $newVideos = $this->handleFileUploads($request->file('link_video'), 'img/koi/video');
        $linkTrophies = $this->handleSingleFileUpload($request->file('trophy'), 'img/koi/trophy');
        $linkCertificates = $this->handleSingleFileUpload($request->file('certificate'), 'img/koi/certificate');
        // Process edited photos
        foreach ($request->file() as $key => $file) {
            if (preg_match('/edit_photo_(\d+)/', $key, $matches) && $file->isValid()) {
                $index = (int) $matches[1];
                if (isset($updatedPhotos[$index])) {
                    // Handle the upload and replace the corresponding photo
                    $newPhotoPath = $this->handleSingleFileUpload($file, 'img/koi/photo');
                    if ($newPhotoPath) {
                        $updatedPhotos[$index] = basename($newPhotoPath); // New photo filename
                    }
                }
            }
        }

        // Handle photo removals
        if ($request->has('remove_photos')) {
            $updatedPhotos = array_diff($updatedPhotos, $request->remove_photos);
        }

        // Finalize photo array by merging with new photos
        $finalPhotos = array_merge($updatedPhotos, $newPhotos);

        //remove photo in public path
        $photoDirectory = public_path('img/koi/photo');
        // $photoToRemove = array_diff(scandir($photoDirectory), ['.', '..']);

        // foreach ($photoToRemove as $file) {
        //     if (!in_array($file, $finalPhotos)) {
        //         $filePath = $photoDirectory . '/' . $file;
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Delete unused photo
        //         }
        //     }
        // }

        foreach ($request->file() as $key => $file) {
            if (preg_match('/edit_video_(\d+)/', $key, $matches) && $file->isValid()) {
                $index = (int) $matches[1];
                if (isset($updatedVideos[$index])) {
                    // Handle the upload and replace the corresponding Video
                    $newVideoPath = $this->handleSingleFileUpload($file, 'img/koi/video');
                    if ($newVideoPath) {
                        $updatedVideos[$index] = basename($newVideoPath); // New photo filename
                    }
                }
            }
        }

        if ($request->has('remove_videos')) {
            $updatedVideos = array_diff($updatedVideos, $request->remove_videos);
        }
        $finalVideos = array_merge($updatedVideos, $newVideos);

        // $videoDirectory = public_path('img/koi/video');
        // $videoToRemove = array_diff(scandir($videoDirectory), ['.', '..']);

        // foreach ($videoToRemove as $file) {
        //     if (!in_array($file, $finalVideos)) {
        //         $filePath = $videoDirectory . '/' . $file;
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Delete unused video
        //         }
        //     }
        // }
        // Update Koi code if base parameters change
        $variety = Variety::find($request->variety);
        $breeder = Breeder::find($request->breeder);
        $purchaseDate = !empty($koi->purchase_date)
            ? Carbon::createFromFormat('Y-m', substr($koi->purchase_date, 0, 7))->format('my')
            : '';
        $requestPurchaseDate = $request->purchase_date ? Carbon::createFromFormat('Y-m', $request->purchase_date)->format('my') : '';
        $isPurchaseDateChanged = $requestPurchaseDate != $purchaseDate;
        $isVarietyChanged = $koi->variety_id != $request->variety;
        $isBreederChanged = $koi->breeder_id != $request->breeder;

        if ($isVarietyChanged || $isBreederChanged || $isPurchaseDateChanged) {
            $sequence = $this->generateSequence($variety, $breeder, $requestPurchaseDate);
            $koiCode = $variety->code . $breeder->code . ($requestPurchaseDate != '' ? $requestPurchaseDate : '0000') . $sequence;
        } else {
            $koiCode = $koi->code;
            $sequence = $koi->sequence;
        }
        // Update Koi record
        $koi->update([
            'code' => $koiCode,
            'nickname' => $request->nickname,
            'variety_id' => $request->variety,
            'breeder_id' => $request->breeder,
            'bloodline_id' => $request->bloodline,
            'sequence' => $sequence,
            'size' => $request->size,
            'birthdate' => $request->birth ? Carbon::createFromFormat('Y-m', $request->birth)->startOfMonth() : null,
            'gender' => $request->gender,
            'purchase_date' => $request->purchase_date ? Carbon::createFromFormat('Y-m', $request->purchase_date)->startOfMonth() : null,
            'seller' => $request->seller ?? '',
            'handler' => $request->handler ?? '',
            'price_buy_idr' => $request->pricebuy_idr ? (int) $request->pricebuy_idr : $koi->price_buy_idr,
            'price_buy_jpy' => $request->pricebuy_jpy ? (int) $request->pricebuy_jpy : $koi->price_buy_jpy,
            'price_sell_idr' => $request->pricesell_idr ? (int) $request->pricesell_idr : $koi->price_sell_idr,
            'price_sell_jpy' => $request->pricesell_jpy ? (int) $request->pricesell_jpy : $koi->price_sell_jpy,
            'location' => $request->location,
            'photo' => implode('|', $finalPhotos),
            'video' => implode('|', $finalVideos),
            'trophy' => $linkTrophies ?: $koi->trophy,
            'certificate' => $linkCertificates ?: $koi->certificate,
            'status' => $request->status,
        ]);


        $entryUrl = $request->input('entryUrl', route('cmskoi') . '?layout=grid'); // Fallback if no entryUrl is provided

        // Ensure we're using the correct entryUrl when redirecting back to the edit page
        return redirect('/CMS/koi/edit/' . $koi->id . '?entryUrl=' . urlencode($entryUrl))
            ->with('success', 'Koi record updated successfully.');
    }

    public function koigupdate(request $request)
    {
        if ($request->file('link_photo') == null) {
            $image = array();
            if ($files = explode('|', $request->link_photos)) {
                $image = $files;
            }
        } else {
            $image = array();
            if ($files = $request->file('link_photo')) {
                foreach ($files as $file) {
                    $link_photo = time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'img/koi/photo';
                    $image_url = $link_photo;
                    $file->move($tujuan_upload, $link_photo);
                    $image[] = $image_url;
                }
            }
        }

        //   if($request->file('photo_highlight') == null){
        //     $imageh = array();
        //     if($files = explode('|', $request->photo_highlights)){
        //     $imageh = $files;
        //     }
        //   }else{
        //     $imageh = array();
        //     if($files = $request->file('photo_highlight')){
        //       foreach ($files as $file){
        //         $photo_highlight = time()."_".$file->getClientOriginalName();
        //         $tujuan_upload = 'img/koi/photo_highlight';
        //         $imageh_url = $photo_highlight;
        //         $file->move($tujuan_upload,$photo_highlight);
        //         $imageh[] = $imageh_url;
        //       }
        //     }
        //   }

        if ($request->file('link_video') == null) {
            $imagev = array();
            if ($files = explode('|', $request->link_videos)) {
                $imagev = $files;
            }
        } else {
            $imagev = array();
            if ($files = $request->file('link_video')) {
                foreach ($files as $file) {
                    $link_video = time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'img/koi/video';
                    $imagev_url = $link_video;
                    $file->move($tujuan_upload, $link_video);
                    $imagev[] = $imagev_url;
                }
            }
        }

        if ($request->file('link_trophy') == null) {
            $link_trophy = $request->link_trophys;
        } else {
            $file_image = $request->file('link_trophy');
            $link_trophy = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/trophy';
            $file_image->move($tujuan_upload, $link_trophy);
        }

        if ($request->file('link_certificate') == null) {
            $link_certificate = $request->link_certificates;
        } else {
            $file_image = $request->file('link_certificate');
            $link_certificate = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/certificate/';
            $file_image->move($tujuan_upload, $link_certificate);
        }

        Koi::where('id', $request->id)->update([
            'koi_code' => $request->koi_code,
            'nickname' => $request->nickname,
            'variety' => $request->variety,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'date_purchese' => $request->date_purchese,
            'salleragent' => $request->salleragent,
            'pricebuy_idr' => $request->pricebuy_idr,
            'pricebuy_jpy' => $request->pricebuy_jpy,
            'kep_loc' => $request->kep_loc,
            'date_sell' => $request->date_sell,
            'photo_highlight' => $request->photo_highlight,
            'breeder' => $request->breeder,
            'bloodline' => $request->bloodline,
            'year' => $request->year,
            'n_status' => $request->n_status
        ]);




        if ($request->id_history != null) {
            History::where('id_history', $request->id_history)->update([
                'koi_id' => $request->koi_id,
                'year' => $request->year,
                'age' => $request->age,
                'size' => $request->size,
                'hagent' => $request->hagent,
                'kep_loc' => $request->kep_loc,
                'photo_highlight' => $request->photo_highlight,
                'link_photo' => implode('|', $image),
                'link_video' => implode('|', $imagev),
                'link_trophy' => $link_trophy,
                'name_trophy' => $request->name_trophy,
                'link_certificate' => $link_certificate,
                'name_certificate' => $request->name_certificate,
                'pricesell_idr' => $request->pricesell_idr,
                'pricesell_jpy' => $request->pricesell_jpy,
                'buyer_name' => $request->buyer_name,
                'death_date' => $request->death_date,
                'death_note' => $request->death_note,
            ]);
        } else {
            History::create([
                'koi_id' => $request->koi_id,
                'year' => $request->year,
                'age' => $request->age,
                'size' => $request->size,
                'hagent' => $request->hagent,
                'kep_loc' => $request->kep_loc,
                'photo_highlight' => $request->photo_highlight,
                'link_photo' => implode('|', $image),
                'link_video' => implode('|', $imagev),
                'link_trophy' => $link_trophy,
                'name_trophy' => $request->name_trophy,
                'link_certificate' => $link_certificate,
                'name_certificate' => $request->name_certificate,
                'pricesell_idr' => $request->pricesell_idr,
                'pricesell_jpy' => $request->pricesell_jpy,
                'buyer_name' => $request->buyer_name,
                'death_date' => $request->death_date,
                'death_note' => $request->death_note,
            ]);
        }

        return redirect('/CMS/koi/grid');
    }

    public function koidelete($id)
    {
        Koi::where('id', $id)->delete();
        return redirect('/CMS/koi');
    }

    public function koigriddelete($id)
    {
        // Delete the Koi record with the specified ID
        Koi::where('id', $id)->delete();
        // Retrieve query parameters for pagination
        $perPage = request()->input('per_page', 8);
        $page = request()->input('page', 1);

        // Redirect back to the koi grid with the pagination parameters
        return redirect()->route('cmskoi', [
            'layout' => 'grid',
            'per_page' => $perPage,
            'page' => $page,
        ]);
    }




    ### KOI filter TABLE ###

    public function koifilter_az()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('variety', 'ASC')->get();
        return view('arthurkaikoiadmin.filter.filter', compact('koitotal', 'koi'));
    }

    public function koifilter_za()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('variety', 'DESC')->get();
        return view('arthurkaikoiadmin.filter.filter_za', compact('koitotal', 'koi'));
    }

    public function koifilter_19()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('id', 'ASC')->get();
        return view('arthurkaikoiadmin.filter.filter_19', compact('koitotal', 'koi'));
    }

    public function koifilter_91()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('id', 'DESC')->get();
        return view('arthurkaikoiadmin.filter.filter_91', compact('koitotal', 'koi'));
    }

    public function koifilter_pricebuyhigh()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('price_buy_idr', 'ASC')->get();
        return view('arthurkaikoiadmin.filter.filter_high', compact('koitotal', 'koi'));
    }

    public function koifilter_pricebuylow()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('price_buy_idr', 'DESC')->get();
        return view('arthurkaikoiadmin.filter.filter_low', compact('koitotal', 'koi'));
    }

    ### KOI filter GRID ###

    public function koigfilter_az()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('variety', 'ASC')->paginate(12);
        return view('arthurkaikoiadmin.filter.filtergrid', compact('koitotal', 'koi'));
    }

    public function koigfilter_za()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('variety', 'DESC')->paginate(12);
        return view('arthurkaikoiadmin.filter.filtergrid', compact('koitotal', 'koi'));
    }

    public function koigfilter_19()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('id', 'ASC')->paginate(12);
        return view('arthurkaikoiadmin.filter.filtergrid', compact('koitotal', 'koi'));
    }

    public function koigfilter_91()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('id', 'DESC')->paginate(12);
        return view('arthurkaikoiadmin.filter.filtergrid', compact('koitotal', 'koi'));
    }

    public function koigfilter_pricebuyhigh()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('price_buy_idr', 'ASC')->paginate(12);
        return view('arthurkaikoiadmin.filter.filtergrid', compact('koitotal', 'koi'));
    }

    public function koigfilter_pricebuylow()
    {
        $koitotal = Koi::count();
        $koi = Koi::orderBy('price_buy_idr', 'DESC')->paginate(12);
        return view('arthurkaikoiadmin.filter.filtergrid', compact('koitotal', 'koi'));
    }

    ### KOI Update Status

    public function statusupdate(request $request)
    {
        if ($request->status == 'Death') {
            $dateDeath = Carbon::now()->format('Y-m-d');
            Koi::where('id', $request->id)->update([
                'status' => $request->status,
                'death_date' => $dateDeath
            ]);
        } else {
            Koi::where('id', $request->id)->update([
                'status' => $request->status,
            ]);
        }
        return redirect()->back();
    }

    ### KOI History

    public function koihistory()
    {
        $koitotal = Koi::count();
        $koi = Koi::all();
        $History = History::all();
        return view('arthurkaikoiadmin.history.history', compact('koitotal', 'koi'));
    }

    ### KOI filter Years ###
    public function koifilter_year($year)
    {
        $koi = Koi::where('year', $year)->get();
        return view('arthurkaikoiadmin.filter.year', compact('koi'));
    }

    ### Variety ###

    public function variety()
    {
        $variety = Variety::all();
        // return response()->json($variety);
        return view('arthurkaikoiadmin.variety.variety', compact('variety'));
    }

    public function varietyadd()
    {
        return view('arthurkaikoiadmin.variety.variety_add');
    }

    public function varietystore(request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:variety,name'], // Ensure 'name' is unique in the 'variety' table
            'code' => ['required', 'unique:variety,code']  // Ensure 'code' is unique in the 'varieties' table
        ]);

        Variety::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect('/CMS/variety');
    }

    public function varietyedit($id)
    {
        $variety = Variety::where('id', $id)->get();
        return view('arthurkaikoiadmin.variety.variety_edit', compact('variety'));
    }

    public function varietyupdate(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required', 'unique:variety,code,' . $request->id], // Ensure unique code
        ]);

        // Fetch the current variety before updating
        $variety = Variety::findOrFail($request->id);

        // Update the variety
        $variety->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        // Update all Koi that have this variety
        $kois = Koi::where('variety_id', $variety->id)->get();
        foreach ($kois as $koi) {
            // Convert the purchase_date string to a Carbon instance (if it's not null)
            $purchaseDate = $koi->purchase_date ? Carbon::parse($koi->purchase_date)->format('my') : '';

            // Fetch the breeder
            $breeder = Breeder::find($koi->breeder_id);

            // Regenerate the Koi code with the updated variety code and other details
            $sequence = str_pad($koi->sequence, 5, '0', STR_PAD_LEFT); // Use existing sequence
            $koiCode = $variety->code . $breeder->code . $purchaseDate . $sequence;

            // Update the Koi record with the new code
            $koi->update([
                'code' => $koiCode,
            ]);
        }


        return redirect('/CMS/variety')->with('success', 'Variety and related Koi codes updated successfully.');
    }


    public function varietydelete($id)
    {
        Variety::where('id', $id)->delete();
        return redirect('/CMS/variety');
    }

    ### Bloodline ###

    public function bloodline()
    {
        $bloodline = Bloodline::all();
        return view('arthurkaikoiadmin.bloodline.bloodline', compact('bloodline'));
    }

    public function bloodlineadd()
    {
        return view('arthurkaikoiadmin.bloodline.bloodline_add');
    }

    public function bloodlinestore(request $request)
    {
        $request->validate([
            'bloodline_name' => ['required'],
            'bloodline_code' => ['required']
        ]);
        Bloodline::create([
            'name' => $request->bloodline_name,
            'code' => $request->bloodline_code,
            // 'variety' => $request->variety,
        ]);

        return redirect('/CMS/bloodline');
    }

    public function bloodlineedit($id)
    {
        $bloodline = Bloodline::where('id', $id)->get();
        return view('arthurkaikoiadmin.bloodline.bloodline_edit', compact('bloodline'));
    }

    public function bloodlineupdate(request $request)
    {
        Bloodline::where('id', $request->id)->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect('/CMS/bloodline');
    }

    public function bloodlinedelete($id)
    {
        Bloodline::where('id', $id)->delete();
        return redirect('/CMS/bloodline');
    }

    ### Breeder ###

    public function breeder()
    {
        $breeder = Breeder::all();
        return view('arthurkaikoiadmin.breeder.breeder', compact('breeder'));
    }

    public function breederadd()
    {
        return view('arthurkaikoiadmin.breeder.breeder_add');
    }

    public function breederstore(request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ]);
        Breeder::create([
            'name' => $request->name,
            'location' => $request->location,
            'contact' => $request->contact,
            'code' => $request->code,
            'website' => $request->website,
        ]);

        return redirect('/CMS/breeder');
    }

    public function breederedit($id)
    {
        $breeder = Breeder::where('id', $id)->get();
        return view('arthurkaikoiadmin.breeder.breeder_edit', compact('breeder'));
    }

    public function breederupdate(request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ]);

        Breeder::where('id', $request->id)->update([
            'name' => $request->name,
            'location' => $request->location,
            'contact' => $request->contact,
            'code' => $request->code,
            'website' => $request->website,
        ]);

        return redirect('/CMS/breeder');
    }

    public function breederdelete($id)
    {
        Breeder::where('id', $id)->delete();
        return redirect('/CMS/breeder');
    }
    ### Agent ###

    public function agent()
    {
        $agent = Agent::all();
        return view('arthurkaikoiadmin.agent.agent', compact('agent'));
    }

    public function agentadd()
    {
        return view('arthurkaikoiadmin.agent.agent_add');
    }

    public function agentstore(request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ]);

        Agent::create([
            'name' => $request->name,
            'location' => $request->location,
            'website' => $request->website,
            'owner' => $request->owner,
            'code' => $request->code,
        ]);

        return redirect('/CMS/agent');
    }

    public function agentedit($id)
    {
        $agent = Agent::where('id', $id)->get();
        return view('arthurkaikoiadmin.agent.agent_edit', compact('agent'));
    }

    public function agentupdate(request $request)
    {
        $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ]);
        Agent::where('id', $request->id)->update([
            'name' => $request->name,
            'location' => $request->location,
            'website' => $request->website,
            'owner' => $request->owner,
            'code' => $request->code,
        ]);

        return redirect('/CMS/agent');
    }

    public function agentdelete($id)
    {
        Agent::where('id', $id)->delete();
        return redirect('/CMS/agent');
    }

    ### Handlin Agent ###

    public function handlingagent()
    {
        $handlingagent = HandlingAgent::all();
        return view('arthurkaikoiadmin.handlingagent.handlingagent', compact('handlingagent'));
    }

    public function handlingagentadd()
    {
        return view('arthurkaikoiadmin.handlingagent.handlingagent_add');
    }

    public function handlingagentstore(request $request)
    {
        HandlingAgent::create([

        ]);

        return redirect('/CMS/handlingagent');
    }

    public function handlingagentedit($id)
    {
        $handlingagent = HandlingAgent::where('id', $id)->get();
        return view('arthurkaikoiadmin.handlingagent.handlingagent_edit', compact('handlingagent'));
    }

    public function handlingagentupdate(request $request)
    {

        HandlingAgent::where('id', $request->id)->update([

        ]);

        return redirect('/CMS/handlingagent');
    }

    public function handlingagentdelete($id)
    {
        HandlingAgent::where('id', $id)->delete();
        return redirect('/CMS/handlingagent');
    }

    ##$ page Website $$$

    /// # Web Uur Collection # ///

    public function ourcollection()
    {
        $ourcollection = OurCollection::with('koi')->get();
        //  return response()->json($ourcollection);
        return view('arthurkaikoiadmin.website.ourcollection.ourcollection', compact('ourcollection'));
    }

    public function ourcollectionadd()
    {
        return view('arthurkaikoiadmin.website.ourcollection.ourcollection_add');
    }

    public function ourcollectionstore(request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'koi_id' => ['required'],
        ]);
        if ($request->file('image') == null) {
            $image = $request->images;
        } else {
            $file_image = $request->file('image');
            $image = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/website/ourcollection';
            $file_image->move($tujuan_upload, $image);
        }
        OurCollection::create([
            'title' => $request->title,
            'description' => $request->description,
            'koi_id' => $request->koi_id,
        ]);
        return redirect('/CMS/ourcollection');
    }

    public function ourcollectionedit($id)
    {
        $ourcollection = OurCollection::where('id', $id)->get();
        return view('arthurkaikoiadmin.website.ourcollection.ourcollection_edit', compact('ourcollection'));
    }

    public function ourcollectionupdate(request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'koi_id' => ['required'],
        ]);

        if ($request->file('image') == null) {
            $image = $request->images;
        } else {
            $file_image = $request->file('image');
            $image = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/website/ourcollection';
            $file_image->move($tujuan_upload, $image);
        }

        OurCollection::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'koi_id' => $request->koi_id
        ]);

        return redirect('/CMS/ourcollection');
    }

    public function ourcollectiondelete($id)
    {
        OurCollection::where('id', $id)->delete();
        return redirect('/CMS/ourcollection');
    }

    /// # Web News # ///
    public function news()
    {
        $news = News::all();
        return view('arthurkaikoiadmin.website.news.news', compact('news'));
    }

    public function newsadd()
    {
        $postTypes = PostType::cases();
        return view('arthurkaikoiadmin.website.news.news_add', compact('postTypes'));
    }

    public function newsstore(request $request)
    {
        $request->validate([
            "title" => ['required'],
            "description" => ['required']
        ]);
        $slug = Str::slug($request->title);
        if ($request->file('image') == null) {
            $image = $request->images;
        } else {
            $file_image = $request->file('image');
            $image = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/website/news';
            $file_image->move($tujuan_upload, $image);
        }

        News::create([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $image,
            'description' => $request->description,
            'type' => $request->category,
        ]);

        return redirect('/CMS/news');
    }

    public function newsedit($id)
    {
        $postTypes = PostType::cases();
        $news = News::where('id', $id)->get();
        return view('arthurkaikoiadmin.website.news.news_edit', compact('news', 'postTypes'));
    }

    public function newsupdate(request $request)
    {
        $request->validate([
            "title" => ['required'],
            "description" => ['required']
        ]);
        $slug = Str::slug($request->title);

        if ($request->file('image') == null) {
            $image = $request->images;
        } else {
            $file_image = $request->file('image');
            $image = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/website/news';
            $file_image->move($tujuan_upload, $image);
        }

        News::where('id', $request->id)->update([
            'title' => $request->input('title'),
            'slug' => $slug,
            'image' => $image,
            'description' => $request->input('description'),
            'type' => $request->input('category'),
        ]);

        return redirect('/CMS/news');
    }

    public function newsdelete($id)
    {
        News::where('id', $id)->delete();
        return redirect('/CMS/news');
    }

    /// # Web About US # ///
    public function aboutus()
    {
        $aboutus = AboutUs::all();
        return view('arthurkaikoiadmin.website.aboutus.aboutus', compact('aboutus'));
    }

    public function aboutusadd()
    {
        return view('arthurkaikoiadmin.website.aboutus.aboutus_add');
    }

    public function aboutusstore(request $request)
    {
        if ($request->file('image') == null) {
            $image = $request->images;
        } else {
            $file_image = $request->file('image');
            $image = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/website/aboutus';
            $file_image->move($tujuan_upload, $image);
        }

        AboutUs::create([
            'image' => $image,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/CMS/aboutus');
    }

    public function aboutusedit($id)
    {
        $aboutus = AboutUs::where('id', $id)->get();
        return view('arthurkaikoiadmin.website.aboutus.aboutus_edit', compact('aboutus'));
    }

    public function aboutusupdate(request $request)
    {
        if ($request->file('image') == null) {
            $image = $request->images;
        } else {
            $file_image = $request->file('image');
            $image = time() . "_" . $file_image->getClientOriginalName();
            $tujuan_upload = 'img/koi/website/aboutus';
            $file_image->move($tujuan_upload, $image);
        }

        AboutUs::where('id', $request->id)->update([
            'image' => $image,
            'description' => $request->deskripsi,
        ]);

        return redirect('/CMS/aboutus');
    }

    public function aboutusdelete($id)
    {
        AboutUs::where('id', $id)->delete();
        return redirect('/CMS/aboutus');
    }

    /// # Web Contact US # ///
    public function contactus()
    {
        $contactus = ContactUs::all();
        return view('arthurkaikoiadmin.website.contactus.contactus', compact('contactus'));
    }

    public function contactusadd()
    {
        return view('arthurkaikoiadmin.website.contactus.contactus_add');
    }

    public function contactusstore(request $request)
    {
        ContactUs::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'message' => $request->message,
        ]);

        return redirect('/CMS/contactus');
    }

    public function contactusedit($id)
    {
        $contactus = ContactUs::where('id_contactus', $id)->get();
        return view('arthurkaikoiadmin.website.contactus.contactus_edit', compact('contactus'));
    }

    public function contactusupdate(request $request)
    {

        ContactUs::where('id_contactus', $request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'message' => $request->message,
        ]);

        return redirect('/CMS/contactus');
    }

    public function contactusdelete($id)
    {
        ContactUs::where('id', $id)->delete();
        return redirect('/CMS/contactus');
    }

}
