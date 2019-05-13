<?php

use App\Containers\Prisoner\Models\Prisoner;
use Faker\Generator as Faker;

$factory->define(Prisoner::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'cell' => 'Cell ' . $faker->numberBetween($min = 1, $max = 9999),
        'block' => 'Detention Block '
                    . strtoupper($faker->randomLetter . $faker->randomLetter)
                    . '-'
                    . $faker->numberBetween($min = 1, $max = 9999)
    ];
});
