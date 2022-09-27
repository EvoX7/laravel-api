<?php

use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $categories = [
            'Sport',
            'News',
            'Tech',
            'Innovation',
            'DevOps',
            'FrontEnd',
            'BackEnd'

        ];

        foreach ($categories as $categoryName) {

            $category = new Category();
            $category->name = ($categoryName);
            $category->color = $faker->hexColor();

            $category->save();
        }
    }
}
