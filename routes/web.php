<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ExtrakulikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\TartibController;
use App\Http\Controllers\RapotController;
use App\Http\Controllers\KelasController;

use App\Http\Controllers\dafExtrakulikulerController;
use App\Http\Controllers\dafNilaiController;
use App\Http\Controllers\dafPrestasiController;
use App\Http\Controllers\dafAdministrasiController;
use App\Http\Controllers\dafKurikulumController;
use App\Http\Controllers\dafTartibController;
use App\Http\Controllers\dafRapotController;
use App\Http\Controllers\dafKelasController;


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
    return view('landingpage');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class,'guru'])->middleware(['auth'])->name('dashboard');

// Nilai
Route::get('dafnilai', [dafNilaiController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('nilai', [NilaiController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('dafnilai', [dafNilaiController::class,'guru'])->middleware(['auth'])->name('dashboard');
Route::get('nilai', [NilaiController::class,'guru'])->middleware(['auth'])->name('dashboard');

// Extrakulikuler
Route::get('dafextrakulikuler', [dafExtrakulikulerController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('extrakulikuler', [ExtrakulikulerController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('dafextrakulikuler', [dafExtrakulikulerController::class,'guru'])->middleware(['auth'])->name('dashboard');
Route::get('extrakulikuler', [ExtrakulikulerController::class,'guru'])->middleware(['auth'])->name('dashboard');

// Prestasi
Route::get('dafprestasi', [dafPrestasiController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('prestasi', [PrestasiController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('dafprestasi', [dafPrestasiController::class,'guru'])->middleware(['auth'])->name('dashboard');
Route::get('prestasi', [PrestasiController::class,'guru'])->middleware(['auth'])->name('dashboard');

// Administrasi
Route::get('dafadministrasi', [dafAdministrasiController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('pengumuman', [PengumumanController::class,'index'])->middleware(['auth'])->name('dashboard');

// Kurikulum
Route::get('dafkurikulum', [dafKurikulumController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('kurikulum', [KurikulumController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('dafkurikulum', [dafKurikulumController::class,'guru'])->middleware(['auth'])->name('dashboard');
Route::get('kurikulum', [KurikulumController::class,'guru'])->middleware(['auth'])->name('dashboard');

// Tata Tertib
Route::get('daftartib', [dafTartibController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('tartib', [TartibController::class,'index'])->middleware(['auth'])->name('dashboard');

// Rapot
Route::get('dafrapot', [dafRapotController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('rapot', [RapotController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('dafrapot', [dafRapotController::class,'guru'])->middleware(['auth'])->name('dashboard');
Route::get('rapot', [RapotController::class,'guru'])->middleware(['auth'])->name('dashboard');

// Kelas
Route::get('dafkelas', [dafKelasController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('kelas', [KelasController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::resource('tasks', TaskCotroller::class);
    Route::post('logout', LogoutController::class);
});

require __DIR__.'/auth.php';

Route::get('redirects','App\Http\Controllers\HomeController@index');