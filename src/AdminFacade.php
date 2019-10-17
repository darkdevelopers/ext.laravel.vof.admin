<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin;
use Illuminate\Support\Facades\Facade;

class AdminFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'admin';
    }
}
