<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors']], function () {
    Route::resource('users', 'Auth\UserController');
    Route::resource('roles', 'Auth\RoleController');
    Route::resource('permissions', 'Auth\PermissionController');
});
Route::group(['middleware' => ['cors']], function () {
    Route::resource('country', 'Parameters\CountryController');
});
