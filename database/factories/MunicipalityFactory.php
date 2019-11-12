<?php
use App\Models\Modelsgenerals\{ Municipality, Departament };
use Faker\Generator as Faker;

$factory->define(Municipality::class, function (Faker $faker) {
    return [
        'description' => 'Barranquilla',
        'departament_id' => function () {
            return factory(Departament::class)->create()->id;
        }
    ];
});
