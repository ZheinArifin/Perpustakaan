<?php

use Illuminate\Support\Facades\Route;

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

// login
Route::get('/', function () {
    return view('Login.index');
})->name('Login');

// Login
Route:: post('/login', 'LoginController@PostLogin')->name('PostLogin');

// Logout
Route:: get('/logout', 'LoginController@Logout')->name('Logout');