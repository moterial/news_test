<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function index()
    {   
        $news = DB::table('news')
        // ->where('is_publish', 1)
        ->LeftJoin('images', 'news.id', '=', 'images.news_id')
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
        // dd($news);
        
        return view('cms.index', compact('news'));
    }

    public function profile()
    {   
        //get the user id from Auth
        $user_id = auth()->user()->id;
        
        $user = DB::table('users')
        ->where('id', $user_id)
        ->get();

        return view('cms.profile',compact( 'user'));
    }

    public function changePassWord(Request $request){
        //get the user id from Auth
        $user_id = auth()->user()->id;
        
        $user = DB::table('users')
        ->where('id', $user_id)
        ->get();

        $old_password = $user[0]->password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        


        if (Hash::check($request->old_password, $old_password)) {
            // The passwords match...
            if($new_password != $confirm_password){
                return redirect()->back()->with('error', 'New password and confirm password is not match');
            }
            if(Hash::check($confirm_password,$old_password)){
                return redirect()->back()->with('error', 'New password and old password is the same');
            }
        }else{
            return redirect()->back()->with('error', 'Old password is not correct');
        }
        // if(Hash::check($request->old_password, $old_password)){
        //     return redirect()->back()->with('error', 'Old password is not correct');
        // }
        // if($new_password != $confirm_password){
        //     return redirect()->back()->with('error', 'New password and confirm password is not match');
        // }
        // if(Hash::check($confirm_password,$old_password)){
        //     return redirect()->back()->with('error', 'New password and old password is the same');
        // }

        DB::table('users')
        ->where('id', $user_id)
        ->update(['password' => 
        Hash::make($request->new_password)]);

        return redirect()->back()->with('message', 'Change password successfully');
    }
}
