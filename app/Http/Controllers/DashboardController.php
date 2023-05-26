<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {   
        $news = DB::table('news')
        // ->where('is_publish', 1)
        ->get();
        // foreach($news as $row){
        //     $data[] = $row;
        // }
        




        return view('cms.index', compact('news'));
    }
}
