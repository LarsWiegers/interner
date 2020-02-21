<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Internship;
use App\States\Internship\NotAppliedYetInternshipState;
use App\User;
use Faker\Generator as Faker;
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

$factory->define(Internship::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text(200),
        'state_class' => NotAppliedYetInternshipState::class
    ];
});
