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
        $category_name = ['HTML', 'CSS', 'JS', 'VueJS', 'PHP', 'Laravel'];

        foreach ($category_name as $name) {
            $category = new Category();
            $category->name = $name;

            $category->save();
        }
    }
}
