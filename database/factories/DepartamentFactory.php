<?php
use App\Models\Modelsgenerals\{ Departament, Country };
use Faker\Generator as Faker;

$factory->define(Departament::class, function (Faker $faker) {
    return [
        'description' => 'ATLANTICO',
        'short_name' => 'ATL',
        'country_id' => function () {
            return factory(Country::class)->create()->id;
        }
    ];
});
