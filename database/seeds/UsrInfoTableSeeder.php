<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\usrInfo;
use Faker\Generator as Faker;

class UsrInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        for ($i = 0; $i < count($users); $i++) {
            $new_UserInfo = new UsrInfo();
            $new_UserInfo->user_id = $i + 1;
            $new_UserInfo->address = $faker->streetAddress();
            $new_UserInfo->image = $faker->imageUrl(300, 300);
            $new_UserInfo->save();
        }
    }
}
