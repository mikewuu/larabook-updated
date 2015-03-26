<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }
    }

}