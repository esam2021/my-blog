<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'esamsy000@gmail.com',
            'password' => Hash::make(12345),
            'avatar' => 'https://images.unsplash.com/photo-1492176273113-2d51f47b23b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVhY2h8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60',
            // 'avatar' => fake()->imageUrl(),
        ]);
        \App\Models\Post::factory(10)->create();
        \App\Models\Comments::factory(10)->create();
    }
}
