<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', '\Vof\Admin\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin');
    Route::post('/', '\Vof\Admin\Controllers\Auth\AdminLoginController@login')->name('admin-login');
    Route::get('/dashboard', '\Vof\Admin\Controllers\AdminController@index')->name('admin-home');
});
