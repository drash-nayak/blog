<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*User::truncate();
        Category::truncate();
        Post::truncate();*/

        $user = User::factory()->create();

        Comment::factory(30)->create();
        //Post::factory(30)->create();
        /*Post::factory(30)->create([
            'user_id' => $user->id
        ]);*/
        /*$user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => '<p>lorem ipsum dolat sit amer.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est excepturi fugit laborum natus quam vel! A animi aperiam ducimus illo inventore libero maiores maxime necessitatibus placeat, quos sapiente sed tempora vitae! Blanditiis, cumque cupiditate dignissimos distinctio minima mollitia necessitatibus nobis nulla numquam obcaecati, officia pariatur praesentium quae quas quibusdam soluta.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>lorem ipsum dolat sit amer.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est excepturi fugit laborum natus quam vel! A animi aperiam ducimus illo inventore libero maiores maxime necessitatibus placeat, quos sapiente sed tempora vitae! Blanditiis, cumque cupiditate dignissimos distinctio minima mollitia necessitatibus nobis nulla numquam obcaecati, officia pariatur praesentium quae quas quibusdam soluta.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => '<p>lorem ipsum dolat sit amer.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est excepturi fugit laborum natus quam vel! A animi aperiam ducimus illo inventore libero maiores maxime necessitatibus placeat, quos sapiente sed tempora vitae! Blanditiis, cumque cupiditate dignissimos distinctio minima mollitia necessitatibus nobis nulla numquam obcaecati, officia pariatur praesentium quae quas quibusdam soluta.</p>'
        ]);*/
    }
}
