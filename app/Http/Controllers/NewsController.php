<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
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

        //redirect back to the page
        return redirect()->route('dashboard.index')->with('message', 'News added successfully');
    }

    public function delete($id){
        $news = News::find($id);
        $news->delete();

        return redirect()->back()->with('message', 'News deleted successfully');
    }

    public function edit(Request $request, $id){

        $news = News::find($id);

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
