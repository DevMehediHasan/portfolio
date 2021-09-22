<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index(){
        $categories = Category::all();
        $recentWorks = RecentWork::latest()->take(6)->get();
        return view('frontend.index', compact('categories','recentWorks'));
    }
}
