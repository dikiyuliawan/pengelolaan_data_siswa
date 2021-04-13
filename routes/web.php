<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index']);
Route::get('/register', [SiteController::class, 'register']);
Route::post('/postregister', [SiteController::class, 'postregister']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'logout']);


// Route::get('/siswa', [SiswaController::class, 'index']);
// Route::post('/siswa', [SiswaController::class, 'store']);
// Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
// Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
// Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/siswa', SiswaController::class);
    Route::get('/siswa/{siswa}/profile', [SiswaController::class, 'profile']);
    Route::post('/siswa/{id}/addnilai', [SiswaController::class, 'addnilai']);
    Route::get('/siswa/{id}/{idmapel}/deletenilai', [SiswaController::class, 'deletenilai']);
    Route::post('/siswa/import', [SiswaController::class, 'import']);
    Route::get('/guru/{id}/profile', [GuruController::class, 'profile']);
    Route::get('/posts', [PostController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function(){
    Route::get('/myprofile', [SiswaController::class, 'myProfile']);
});

Route::get('/getdatasiswa', [SiswaController::class, 'getDataSiswa'])->name('ajax.get.data.siswa');

Route::get('/{slug}', [SiteController::class, 'singlepost'])->name('site.single.post');