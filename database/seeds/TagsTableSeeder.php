<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'windows10',
            'linux',
            'techInsider',
            'thunder',
            'lovely',
            'fixit',
        ];

        foreach ($tags as $tagName) {

            $addTag = new Tag();
            $addTag->name = ($tagName);
            
            $addTag->save();
        }
    }
}
