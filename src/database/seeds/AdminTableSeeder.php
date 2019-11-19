<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Vof\Admin\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => 'blackfire2k7@gmail.com',
            'password' => Hash::make('523523'),
            'name' => 'Marco Schauer',
        ]);
    }
}
