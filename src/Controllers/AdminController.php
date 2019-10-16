<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class AdminController
 * @package Vof\Admin\Controllers
 */
class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin::index');
    }

    public function login()
    {

        return null;
    }
}
