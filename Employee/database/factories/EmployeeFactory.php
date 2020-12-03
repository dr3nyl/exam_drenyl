<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'company_id' => factory(\App\Employee::class),
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'address' => $faker->phoneNumber,
    ];
});
