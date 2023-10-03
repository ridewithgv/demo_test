<?php

use App\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home1', function () {
    abort(403, 'Sorry !! You are Unauthorized to create any role !');
    return view('welcome');
});

Auth::routes();


/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth.user'], function () {

    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    
    Route::resource('author', 'Backend\AuthorController');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    });
    // Login Routes
    Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');
    });
    // Logout Routes

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
