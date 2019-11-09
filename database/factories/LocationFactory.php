<?php
use App\Models\Modelsgenerals\{ Location, Municipality };
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(1),
        'short_name' => $faker->sentence(1),
        'municipality_id' => function () {
            return factory(Municipality::class)->create()->id;
        }
    ];
});
