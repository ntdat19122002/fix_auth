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
        return view('policy.index');
    } 

    public function show(Post $post){
        return view('policy.show')->with('post',$post);
    } 
}
