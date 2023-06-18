<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing records from the posts table
        Post::truncate();

        // Create dummy posts
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'content' => $faker->paragraph,

            ]);
        }
    }
}