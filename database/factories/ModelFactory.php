<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->e164PhoneNumber,
        'verified' => '1',
        'password' => $password ?: $password = bcrypt('test'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {

    return [
        'user_id' => factory(App\User::class)->create()->id,
        'category' => $faker->sentence,
        'project_name' => $faker->sentence,
        'skills' => $faker->sentence,
        'description' => $faker->text,
        'budget_from' => $faker->randomDigit,
        'budget_to' => $faker->randomDigit,
    ];
});

$factory->define(App\ProjectCategories::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->firstNameMale,
    ];
});

$factory->define(App\ProjectSubCategories::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->firstNameMale,
        'category_id' => factory(App\ProjectCategories::class)->create()->id,
    ];
});

$factory->define(App\Skills::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->firstNameMale,
    ];
});

$factory->define(App\SubSkills::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->firstNameMale,

        'skills_id' => factory(App\Skills::class)->create()->id,
    ];
});