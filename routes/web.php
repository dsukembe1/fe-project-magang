<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;

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

Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('home', [HomeController::class,'index'])->middleware(['auth'])->name('home');


Route::middleware('auth')->group(function(){
    Route::resource('tasks', TaskCotroller::class);
    Route::post('logout', LogoutController::class);
});

require __DIR__.'/auth.php';
