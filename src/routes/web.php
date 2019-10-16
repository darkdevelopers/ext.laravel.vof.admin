<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

Route::group(['middleware' => ['web'], 'namespace' => 'Vof\Admin\Controllers'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::post('/admin/login', 'AdminController@login')->name('admin-login');
});
