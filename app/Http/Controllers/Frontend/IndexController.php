<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\RecentWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function Index(){
        $categories = Category::all();
        $recentWorks = RecentWork::latest()->take(6)->get();
        return view('frontend.index', compact('categories','recentWorks'));
    }
}
