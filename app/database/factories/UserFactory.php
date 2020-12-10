<?php
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'fullname' => $faker->firstName,
        'email' => $faker->email,
        'password' => \Illuminate\Support\Facades\Hash::make('pass'),
        'city' => $faker->city,
        'status' => rand(1,0)
    ];
});