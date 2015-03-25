<?php

$factory('App\User', [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => $faker->word,
]);

$factory('App\Status', [
   'body' => $faker->text(),
    //'user_id' => 'factory:App\User',
]);