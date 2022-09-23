<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            // 'email_verify_at' => date('2022-09-20 07:45:29'),
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            // 'email_verify_at' => date('2022-09-20 07:45:29'),
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        User::create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            // 'email_verify_at' => date('2022-09-20 07:45:29'),
            'password' => bcrypt('password'),
            'role' => 'editor'
        ]);

        Post::factory(1000)->create();
    }
}
