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

// =========================================== RESTFULL API ========================================== //
Route:: GET('/api/books', 'ApiController@get_all_book');
Route:: GET('/api/books/{id}', 'ApiController@edit_book');
Route:: POST('/api/books', 'ApiController@save_book');
Route:: PUT('/api/books/{id}', 'ApiController@update_book');
Route:: DELETE('api/books/{id}', 'ApiController@delete_book');

// ============================================== Page ============================================== //
Route:: GET('/dashboard', function () {
    return view('Page.index');
})->name('Login');

    // ============================================== Page Buku ============================================== //
    Route:: GET('/books', function () {
        return view('Page.Buku.buku');
    })->name('Buku');

    Route:: GET('/book/add', function () {
        return view('Page.Buku.add-buku');
    })->name('Add-Book');

    Route:: GET('/book/edit/{id}', 'BukuController@edit_buku');
    Route:: PUT('/book/edit/update/{id}', 'BukuController@update_buku');
    Route:: POST('/book/add/save', 'BukuController@save_buku');
    Route:: DELETE('/book/delete/{id}', 'BukuController@delete_buku');
    // =============================================== End Buku ============================================== //

    // ============================================== Page Anggota ============================================== //
    Route:: GET('/anggota', function () {
        return view('Page.Anggota.anggota');
    })->name('Anggota');

    Route:: GET('/anggota/add', function () {
        return view('Page.Anggota.add-anggota');
    })->name('Add-Anggota');

    Route:: GET('/anggota/edit/{id}', 'AnggotaController@edit_anggota');
    Route:: PUT('/anggota/edit/update/{id}', 'AnggotaController@update_anggota');
    Route:: POST('/anggota/add/save', 'AnggotaController@save_anggota');
    Route:: DELETE('/anggota/delete/{id}', 'AnggotaController@delete_anggota');
    // =============================================== End Anggota ============================================== //

    // ============================================== Page Peminjaman ============================================== //
    Route:: GET('/peminjaman', 'PeminjamanController@peminjaman')->name('Peminjaman');
    Route:: POST('/peminjaman/add/save', 'PeminjamanController@save_peminjaman');

    Route:: GET('/pengajuan-peminjaman', 'PeminjamanController@pengajuan_peminjaman')->name('Pengajuan-Peminjaman');
    Route:: POST('/pengajuan/setuju', 'PeminjamanController@setujui_peminjaman');
    Route:: POST('/pengajuan/tidak', 'PeminjamanController@disagree_peminjaman');
    Route:: POST('/pengajuan/returned', 'PeminjamanController@return_peminjaman');
    

    // Route:: GET('/peminjaman/add', function () {
    //     return view('Page.Peminjaman.add-anggota');
    // })->name('Add-Anggota');

    // Route:: GET('/peminjaman/edit/{id}', 'AnggotaController@edit_anggota');
    // Route:: PUT('/peminjaman/edit/update/{id}', 'AnggotaController@update_anggota');
    // Route:: POST('/peminjaman/add/save', 'AnggotaController@save_anggota');
    // Route:: DELETE('/peminjaman/delete/{id}', 'AnggotaController@delete_anggota');
    // =============================================== End Peminjaman ============================================== //

// ============================================ END Page ============================================== //