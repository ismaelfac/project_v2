<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Spatie\Permission\Models\Role;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1)
    ];
});
