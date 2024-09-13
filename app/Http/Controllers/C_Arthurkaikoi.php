<?php

namespace App\Http\Controllers;

use App\Models\OurCollection;
use Illuminate\Http\Request;

use App\Models\Koi;
use App\Models\AboutUs;
use App\Models\News;

class C_Arthurkaikoi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ourCollection = OurCollection::with('koi')->limit(4)->get();
        $news = News::latest()->limit(3)->get();
        return view('arthurkaikoi.home', compact('ourCollection', 'news'));
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
        $news = News::where('type', 'LIKE', 'news')->latest()->paginate(10);
        return view('arthurkaikoi.news', compact('news'));
    }

    public function news_details($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('arthurkaikoi.news_detail', compact('news'));
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
