<?php

namespace App\Imports;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements WithHeadingRow, ToCollection
{
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required',
        ])->validate();
        foreach ($rows as $row) 
        {
            $user_id = User::where('name',$row['user'])->first()->id;
            Post::create([
                'user_id' => $user_id,
                'title' => $row['title'],
                'description' => $row['description'],
            ]);
        }
    }
    // public function model(array $row)
    // {   
    //     dd($row);
    //     return new Post([
    //         'user_id' => $row[0],
    //         'title' => $row[1],
    //         'description' => $row[2]
    //     ]);
    // }
}
