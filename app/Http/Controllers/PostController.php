<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Datatables;

class PostController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Post::with('user')->get();
            return datatables($data)->make(true);
        }
        $posts = Post::with('user')->get();
        return view('policy.index',compact('posts'));
    } 

    public function show(Post $post){
        return view('policy.show')->with('post',$post);
    } 
}
