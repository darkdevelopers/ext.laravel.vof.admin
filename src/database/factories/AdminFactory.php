<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Vof\Admin\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('secret'),
    ];
});
