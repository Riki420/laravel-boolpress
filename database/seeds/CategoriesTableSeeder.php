<?php

use Illuminate\Database\Seeder;
use App\Models\Category;


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
            [
                'name' => 'HTML',
                'color' => 'secondary'
            ],
            [
                'name' => 'CSS',
                'color' => 'primary'
            ],
            [
                'name' => 'Vue Js',
                'color' => 'success'
            ],
            [
                'name' => 'JS',
                'color' => 'warning'
            ],
            [
                'name' => 'Laravel',
                'color' => 'danger'
            ],
            [
                'name' => 'PHP',
                'color' => 'info'
            ],
        ];
        foreach ($categories as $category) {
            $categ = new Category();
            $categ->fill($category);
            $categ->save();
        }
    }
}
