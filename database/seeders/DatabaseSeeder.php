<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Posts;

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
        Category::truncate();
        Posts::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => "Personal",
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => "Family",
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => "Work",
            'slug' => 'work'
        ]);

        Posts::create([
            'category_id' => $personal->id,
            'user_id' => $user->id,
            'title' => "My Personal Post",
            'slug' => 'personal-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error assumenda doloribus quod laboriosam expedita eaque accusantium dolor eum, quasi, officiis voluptate dicta qui quisquam vel veniam illo ab voluptas eos?</p>'
        ]);

        Posts::create([
            'category_id' => $family->id,
            'user_id' => $user->id,
            'title' => "My Family Post",
            'slug' => 'family-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error assumenda doloribus quod laboriosam expedita eaque accusantium dolor eum, quasi, officiis voluptate dicta qui quisquam vel veniam illo ab voluptas eos?</p>'
        ]);

        Posts::create([
            'category_id' => $work->id,
            'user_id' => $user->id,
            'title' => "My Work Post",
            'slug' => 'work-post',
            'excerpt' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error assumenda doloribus quod laboriosam expedita eaque accusantium dolor eum, quasi, officiis voluptate dicta qui quisquam vel veniam illo ab voluptas eos?</p>'
        ]);


    }
}
