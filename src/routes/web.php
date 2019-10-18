<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

/*Route::prefix('admin')->group(function () {
    Route::get('/', '\Vof\Admin\Controllers\Auth\AdminLoginController@showLoginForm')->name('admin');
    Route::post('/', '\Vof\Admin\Controllers\Auth\AdminLoginController@login')->name('admin-login');
    Route::get('/dashboard', '\Vof\Admin\Controllers\AdminController@index')->name('admin-home');
});*/

Route::group(['middleware' => ['web'], 'namespace' => 'Vof\Admin\Controllers'], function () {
    Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin');
    Route::post('/admin', 'Auth\AdminLoginController@login')->name('admin-login');
});

Route::group(['middleware' => ['auth:admin'], 'namespace' => 'Vof\Admin\Controllers'], function () {
    Route::get('/admin/dashboard', 'AdminController@login')->name('admin-home');
});
