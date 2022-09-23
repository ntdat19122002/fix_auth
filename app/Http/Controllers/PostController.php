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

            $columns = [
                "draw" => 2,
                "recordsTotal" => $data->count(),
                "recordsFiltered" => $data->count(),
                'data' => $data->map(function($post){
                    return[
                        'id'            =>$post->id,
                        'title'         =>$post->title,
                        'description'   =>$post->description,
                        'username'      =>$post->user->name
                    ];
                }),
            ];
            $json = json_encode($columns);
            return $json;
        }
        return view('policy.index');
    } 

    public function show(Post $post){
        return view('policy.show')->with('post',$post);
    } 
}
