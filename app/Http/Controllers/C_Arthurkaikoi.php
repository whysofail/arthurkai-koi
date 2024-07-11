<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Koi;


class C_Arthurkaikoi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('arthurkaikoi.home');
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
        return view('arthurkaikoi.aboutus');
    }

    public function contactus()
    {
        return view('arthurkaikoi.contactus');
    }
}
