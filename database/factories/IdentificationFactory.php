<?php
use App\Models\Modelsgenerals\Identification;
use Faker\Generator as Faker;

$factory->define(Identification::class, function (Faker $faker) {
    return [
        'description' => 'Cedula de Ciudadania',
        'short_name' => 'cc'
    ];
});
