<?php

use App\User;
use Faker\Factory as Faker;
use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create();

        // Array that contains various id's of user table
        $users = User::lists('id');

        foreach(range(1, 1000) as $index)
        {
            Status::create([
                'user_id' => $faker->randomElement($users),
                'body' => $faker->sentence(),
                'created_at' => $faker->dateTimeThisMonth($max='Now')
            ]);
        }
    }

}