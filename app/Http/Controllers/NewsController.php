<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    public function index()
    {   

        return view('cms.news.create');
    }

    public function add(Request $request){
        
        
        if(!$request->image){
            return redirect()->back()->with('error', 'Please upload image');
        }
        if(!$request->title){
            return redirect()->back()->with('error', 'Please enter title');
        }
        if(!$request->content){
            return redirect()->back()->with('error', 'Please enter content');
        }
        if(!$request->publish){
            return redirect()->back()->with('error', 'Please select publish');
        }
    
       
        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->link = $request->link;
        $news->is_publish = $request->publish?true:false;

        $news->save();

        //get the id of the news
        $news_id = $news->id;
        
        if($request->image){
            foreach ($request->image as $image) {
                $images = new Images;
                $destinationPath = 'uploads';
                $myimage = time().$image->getClientOriginalName();
                $path = $image->move(public_path($destinationPath), $myimage);
                $images->image_path = $myimage;
                $images->news_id = $news_id;
                $images->save();
                
            }
        }else{
            $images = new Images;
            $images->image_path = $images->image_path;
            $images->news_id = $news_id;
            $images->save();
        }

        //redirect back to the page
        return redirect()->route('dashboard.index')->with('message', 'News added successfully');
    }

    public function delete($id){
        $news = News::find($id);
        $news->delete();

        return redirect()->back()->with('message', 'News deleted successfully');
    }

    public function edit(Request $request, $id){

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
        // dd($news);
        
        return view('cms.news.edit', compact('news'));  

    }

    public function update(Request $request, $id){


        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        if($request->image){
            $destinationPath = 'uploads';
            $myimage = time().$request->image->getClientOriginalName();
            $path = $request->image->move(public_path($destinationPath), $myimage);
            $news->image = $myimage;
        }else{
            $news->image = $news->image;
        }
        $news->link = $request->link;
        $news->is_publish = $request->publish?true:false;
        $news->save();

        // //redirect back to the page call index()
        return redirect()->route('dashboard.index')->with('message', 'News edited successfully');
    }


}
