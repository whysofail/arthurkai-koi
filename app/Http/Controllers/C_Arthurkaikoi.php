<?php

namespace App\Http\Controllers;

use App\Models\OurCollection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Koi;
use App\Models\AboutUs;


class C_Arthurkaikoi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ourCollection = OurCollection::with('koi')->limit(4)->get();
        return view('arthurkaikoi.home', compact('ourCollection'));
    }

    public function our()
    {
        return view('arthurkaikoi.our');
    }

    public function our_detail()
    {
        return view('arthurkaikoi.detail.our');
    }

    public function news()
    {
        return view('arthurkaikoi.news');
    }

    public function news_detail()
    {
        return view('arthurkaikoi.news_detail');
    }

    public function aboutus()
    {
        $about = AboutUs::latest()->first();
        return view('arthurkaikoi.aboutus', compact('about'));
    }

    public function contactus()
    {
        return view('arthurkaikoi.contactus');
    }
}
