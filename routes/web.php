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
Route::GET('/', function () {
    return view('Login.index');
})->name('Login');

// Login
Route:: POST('/login', 'LoginController@PostLogin')->name('PostLogin');

// Logout
Route:: GET('/logout', 'LoginController@Logout')->name('Logout');

// Api
Route:: GET('/api/books', 'ApiController@get_all_book');

// ============================================== Page ============================================== //
Route:: GET('/dashboard', function () {
    return view('Page.index');
})->name('Login');

    // ============================================== Page Buku ============================================== //
    Route:: GET('/books', function () {
        return view('Page.buku');
    })->name('Buku');

    Route:: GET('/book/add', function () {
        return view('Page.add-buku');
    })->name('Add-Book');

    Route:: GET('/book/edit/{id}', 'BukuController@edit_buku');
    Route:: PUT('/book/edit/update/{id}', 'BukuController@update_buku');
    Route:: POST('/book/add/save', 'BukuController@save_buku');
    Route:: DELETE('/book/delete/{id}', 'BukuController@delete_buku');
    // =============================================== End Buku ============================================== //

// ============================================ END Page ============================================== //