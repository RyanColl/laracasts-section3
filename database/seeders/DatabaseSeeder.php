<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::truncate();
        Post::truncate();
        Category::truncate();

        User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        $post = Post::factory(10)->create([
            'user_id' => $user->id,
        ]);
        $category = Category::factory(10)->create();
        // $user1 = $user[0];
        // $user2 = $user[1];
        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);
        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);
        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);
        // Post::create([
        //     'user_id' => $user1->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My First Post',
        //     'slug' => 'personal',
        //     'excerpt' => 'This is the first post in the db',
        //     'body' => 'This is the body for the first post, also a personal post in the db'
        // ]);
        // Post::create([
        //     'user_id' => $user2->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Second Post',
        //     'slug' => 'work',
        //     'excerpt' => 'This is the second post in the db',
        //     'body' => 'This is the body for the second post, also a work post in the db'
        // ]);
    }
}
