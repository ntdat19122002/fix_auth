<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Post;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index(Request $request){
        // if ($request->ajax()) {
        //     $data = Post::with('user')->paginate(5);
        //     $columns = [
        //         "draw" => 2,
        //         "recordsTotal" => $data->total(),
        //         "recordsFiltered" => $data->total(),
        //         'data' => $data->items()
        //     ];
        //     return response()->json($columns);
        // }
        if($request->ajax()) {
            $input = $request->all();

            $page = (int)$input['start']/$input['length'] + 1;
            // dd($page); 
            $data = Post::with('user')->paginate(5, page: $page);
           
            return json_encode([
                "draw" => (int)$request->get('draw'),
                "iTotalRecords" => $data->total(),
                "iTotalDisplayRecords" => $data->total(),
                "aaData" => $data->items(),
            ]);
        }
        return view('policy.index');
    } 

    public function show(Post $post){
        return view('policy.show')->with('post',$post);
    } 

    public function export() 
    {
        return Excel::download(new PostsExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PostsImport, $file);
        
        return redirect('/posts')->with('success', 'All good!');
    }
}
