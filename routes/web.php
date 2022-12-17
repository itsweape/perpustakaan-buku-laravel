<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KomentarController;
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
Auth::routes([
]);

Route::get('/', function () {
    return redirect('/login');
});
Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
Route::post('buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::post('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::get('buku/search', [BukuController::class, 'search'])->name('buku.search');

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::post('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('galeri.edit');
Route::post('/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
Route::post('/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::get('detail-buku/{judul}', [BukuController::class, 'galbuku'])->name('buku.detail');
Route::get('/galeri/like/{id}', [BukuController::class, 'likefoto'])->name('like.foto');

Route::post('/buku/komentar', [KomentarController::class, 'store'])->name('komentar.store');