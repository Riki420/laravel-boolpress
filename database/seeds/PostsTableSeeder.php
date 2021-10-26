<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_id = Category::pluck('id')->toArray();
        $users_id = User::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->user_id = Arr::random($users_id);
            $post->category_id = Arr::random($categories_id);
            $post->title = $faker->text(50);
            $post->content = $faker->paragraph(4, true);
            $post->image = $faker->imageUrl(300, 300);
            $post->save();
        };
    }
}
