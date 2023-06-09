<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {   
        $news = DB::table('news')
        ->LeftJoin('images', 'news.id', '=', 'images.news_id')
        ->where('is_publish', 1)
        ->get();

        $temp =[];
        foreach($news as $row){
            $temp[$row->news_id]['id'] = $row->news_id;    
            $temp[$row->news_id]['title'] = $row->title;
            $temp[$row->news_id]['content'] = $row->content;
            $temp[$row->news_id]['author'] = $row->author;
            $temp[$row->news_id]['link'] = $row->link;
            $temp[$row->news_id]['updated_at'] = $row->updated_at;
            $temp[$row->news_id]['is_publish'] = $row->is_publish;
            $temp[$row->news_id]['image'][] = $row->image_path;

        }
        $news = $temp;
       
        return view('website.index', compact('news'));
    }

    public function detail($id){
        $news = DB::table('news')
        // ->where('is_publish', 1)
        ->where('news.id', $id)
        ->get();
        
        $images = DB::table('images')
        ->where('news_id', $id)
        ->get();

        $temp =[];  
        foreach ($images as $row) {
            array_push($temp, $row->image_path);
        }

        $news[0]->image = $temp;  
        
        return view('website.news_detail', compact('news'));
    }


}