<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koi;

use App\Models\History;
use App\Models\Variety;
use App\Models\Bloodline;
use App\Models\Breeder;
use App\Models\Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $koi = Koi::count();
        $variety = Variety::count();
        $bloodline = Bloodline::count();
        $breeder = Breeder::count();
        $agent = Agent::count();

        return view('arthurkaikoiadmin.homemenu', compact('koi', 'variety', 'bloodline', 'breeder', 'agent'));
    }
}
