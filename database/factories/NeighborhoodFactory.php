<?php
use App\Models\Modelsgenerals\{ Neighborhood, Location };
use Faker\Generator as Faker;

$factory->define(Neighborhood::class, function (Faker $faker) {
    return [
        'description' => 'Delicias',
        'location_id' => function () {
            return factory(Location::class)->create()->id;
        }
    ];
});
