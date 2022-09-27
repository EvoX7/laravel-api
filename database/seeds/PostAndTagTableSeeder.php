<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostAndTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();


        foreach ($posts as $post) {
            $randTags = Tag::inRandomOrder()->limit(2)->get();

            foreach ($randTags as $tag) {
                $post->tags()->attach($tag->id);
            }
        }
    }
}
