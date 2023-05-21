<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\PolaTarifController;
use App\Http\Controllers\Auth\TarifDokterController;
use App\Http\Controllers\Auth\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//redir users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/detail', function () {
    return view('detailAntrian');
})->middleware(['auth', 'verified']);

Route::get('/polatarif', function () {
    return view('admin.polaTarif');
})->middleware('auth')->name('polaTarif');



Route::get('/tambahklinik', function () {
    return view('admin.tambahKlinik');
})->middleware('auth')->name('tambahKlinik');

Route::get('tarifdokter', [TarifDokterController::class, 'showUser'])->name('tarifDokter');

//Auth user login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
