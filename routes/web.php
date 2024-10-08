<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\DivisiController;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
>>>>>>> bb58327 (crud divisi)
=======
>>>>>>> e41322128cd3a9798ee14ece35356f93be63f7bd

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

Route::get('/', function () {
    return redirect('login');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function() {
    return view('layouts.main');
});
<<<<<<< HEAD
=======

<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/divisi', [DivisiController::class, 'index']);
Route::get('/divisi/tambah', [DivisiController::class, 'tambah']);
Route::post('/divisi', [DivisiController::class, 'tambah_proses']);
>>>>>>> bb58327 (crud divisi)
=======
=======
>>>>>>> e41322128cd3a9798ee14ece35356f93be63f7bd
Route::group(['middleware' => ['auth']], function () {
    Route::get('/divisi', [DivisiController::class, 'index']);
    Route::get('/divisi/tambah', [DivisiController::class, 'tambah']);
    Route::post('/divisi', [DivisiController::class, 'tambah_proses']);
    Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit']);
    Route::delete('/divisi/{id}', [DivisiController::class, 'hapus']);
});
<<<<<<< HEAD
>>>>>>> e413221 (tambahkan alert, validasi, middleware)
=======
>>>>>>> e41322128cd3a9798ee14ece35356f93be63f7bd
