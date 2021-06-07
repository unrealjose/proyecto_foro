<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ForoController, TemaController, PostController, UserController};

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
    return view('auth.login');
});

Route::resource('foro', ForoController::class);
Route::resource('tema', TemaController::class);
Route::resource('post', PostController::class);
Route::resource('user', UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('foro', ForoController::class);
    Route::resource('tema', TemaController::class);
    Route::resource('post', PostController::class);
    Route::resource('user', UserController::class);
});

require __DIR__.'/auth.php';
