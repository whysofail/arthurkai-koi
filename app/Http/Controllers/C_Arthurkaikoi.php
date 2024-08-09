<?php

namespace App\Http\Controllers;

use App\Models\OurCollection;
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
        $ourCollection = OurCollection::with('koi')->paginate(10);
        return view('arthurkaikoi.our', compact('ourCollection'));
    }

    public function our_detail(Request $request, $id)
    {
        $ourCollection = OurCollection::with('koi')->findOrFail($id);
        return view('arthurkaikoi.detail.our', compact('ourCollection'));
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
