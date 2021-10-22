<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'HTML', 'CSS', 'JS', 'VueJS', 'PHP', 'Laravel'
        ];

        foreach ($categories as $category) {
            $category = new Category();
            $category->fill = ($category);

            $category->save();
        }
    }
}
