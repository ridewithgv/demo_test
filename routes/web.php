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


Auth::routes();


/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth.user'], function () {

    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    
    Route::resource('author', 'Backend\AuthorController');
    
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    });
    // Login Routes
    Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');
    });
    // Logout Routes

});
