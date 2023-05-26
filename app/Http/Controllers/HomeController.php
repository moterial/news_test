<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function index() 
    {   
        $news = News::where('is_publish', 1)->get();
        return view('website.index', compact('news'));
    }
}