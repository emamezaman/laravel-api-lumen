


<?php

use Faker\Generator as Faker;
use App\User;
use App\Course;
use App\Episode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email'    => $faker->email,
        'password' => Hash::make(str_random(10)),
        'api_token'=> Str::random(60),
        'provider'=> '',
        'provider_id'=> '',
        'remember_token'=>Str::random(60)
    ];
});
$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(), //5 words
        'body'  => $faker->paragraph(10),//10 line
        'price' => $faker->numberBetween(1000,10000),
        'image' => $faker->imageUrl()
    ];
});

$factory->define(Episode::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence(), //5 words
        'body'      => $faker->paragraph(10),//10 line
        'video_url' => 'https://www.radiantmediaplayer.com/media/bbb-360p.mp4',

    ];
});


