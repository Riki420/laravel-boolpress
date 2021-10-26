<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_name = [

            'HTML', 'JS', 'CSS', 'Laravel', 'VueJs', 'PHP'

        ];
        foreach ($categories_name as $category_name) {
            $new_categ = new Category();
            $new_categ->name = $category_name;
            $new_categ->color = $faker->hexColor();
            $new_categ->save();
        }
    }
}
