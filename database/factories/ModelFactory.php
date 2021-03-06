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

$factory->define(Modules\Core\Models\Staff::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});




$factory->define(Modules\Relations\Models\Relation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company(),
        'shortname' => strtolower(trim($faker->company())),
        'relationtype_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});

$factory->define(Modules\Relations\Models\RelationAddress::class, function (Faker\Generator $faker) {
    return [
        'ismain' => '0',
        'addresstype_id' => $faker->numberBetween($min = 1, $max = 5),
        'address' => $faker->secondaryAddress(),
        'address2' => null,
        'housenumber' => $faker->randomNumber(5),
        'housenumberaddition' => null,
        'postalcode' => $faker->randomNumber(5),
        'city_id' => $faker->randomNumber(100),
        'country_id' =>  $faker->numberBetween($min = 1, $max = 100)
    ];
});

