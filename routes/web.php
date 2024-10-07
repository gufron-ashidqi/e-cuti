<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
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

Route::get('/divisi', [DivisiController::class, 'index']);
Route::get('/divisi/tambah', [DivisiController::class, 'tambah']);
Route::post('/divisi', [DivisiController::class, 'tambah_proses']);
