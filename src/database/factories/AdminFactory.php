<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\database\AdminFactory;

use Vof\Admin\Models\Admin;
use Faker\Generator as Faker;
use Faker\Factory as Factory;
use Illuminate\Support\Facades\Hash;

$factory = \Illuminate\Database\Eloquent\Factory::construct(
    Factory::create(),
    dirname(__DIR__).'factories'
);

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('secret'),
    ];
});
