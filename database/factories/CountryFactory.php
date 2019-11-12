<?php
use App\Models\Modelsgenerals\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'code' => '08',
        'description' => 'Colombia',
        'nationality' => 'Colombiana',
        'short_name' => 'CO'
    ];
});
