<?php

namespace Database\Seeders;

use App\Models\Admin\Like;
use App\Models\Admin\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(9)->create();        
        User::factory()->create([
            'token' => Str::uuid(),
            'first_name' => 'Leandro',
            'last_name' => 'Oliveira',
            'email' => 'lfoadm@icloud.com',
        ]);

        Post::factory(10)->create()->each(function ($post) {
            return $post->like()->save(Like::factory()->make());
        });

        
    }
}
