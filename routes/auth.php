<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Auth\AddDokterController; 
use App\Http\Controllers\Auth\AddKlinikController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\PolaTarifController;
use App\Http\Controllers\Auth\TarifDokterController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\DetailAdminPasienController;
use App\Http\Controllers\Auth\DetailAdminKlinikController;
use App\Http\Controllers\Auth\DetailAdminDokterController;
use App\Http\Controllers\Auth\LaporanController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'login'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


});


// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get('/dashboard', [UserController::class, 'showKlinik'])->name('dashboard');
    Route::patch('/dashboard/{klinik}', [UserController::class, 'update'])->name('dashboard.update');
    Route::get('/detail', [UserController::class, 'show'])->name('detail');

    Route::get('/upload-file', [FileUploadController::class, 'createForm'])->name('jalur');
    Route::post('/upload-file', [FileUploadController::class, 'fileUpload'])->name('fileUpload');
    Route::get('/jalur-umum', [FileUploadController::class, 'jalurUmum'])->name('jalurUmum');
});

// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get('tambahdokter', [AddDokterController::class, 'createDokter'])
            ->name('tambahdokter');

    Route::post('tambahdokter', [AddDokterController::class, 'addDokter']);

    Route::get('tambahklinik', [AddKlinikController::class, 'createKlinik'])
    ->name('tambahklinik');

    Route::post('tambahklinik', [AddKlinikController::class, 'addKlinik']);

    Route::get('polatarif', [PolaTarifController::class, 'createTarif'])
    ->name('polatarif');

    Route::get('laporan', [LaporanController::class, 'showLaporan'])->name('laporan');
    Route::get('laporan-update', [LaporanController::class, 'updateRangeLaporan'])->name('laporanupdate');

    Route::post('polatarif', [PolaTarifController::class, 'addTarif']);

    Route::get('/admin', [AdminController::class, 'showAdmin'])->name('adminDash');

    //detail admin
    Route::get('admin/detail-pasien', [DetailAdminPasienController::class, 'showDetailPasien'])
    ->name('showdetailpasien');

    Route::get('/admin/detail-pasien/view/ktp/{id}',[DetailAdminPasienController::class,'viewKtp']);

    Route::get('/admin/detail-pasien/view/bpjs/{id}',[DetailAdminPasienController::class,'viewBpjs']);

    Route::get('admin/detail-klinik', [DetailAdminKlinikController::class, 'showDetailKlinik'])
    ->name('showdetailklinik');

    Route::get('admin/detail-klinik/delete/{id}',[DetailAdminKlinikController::class,'destroy']);
    Route::get('admin/detail-klinik/status/{id}/{status}',[DetailAdminKlinikController::class,'update']);

    Route::get('admin/detail-dokter', [DetailAdminDokterController::class, 'showDetailDokter'])
    ->name('showdetaildokter');


    Route::get('admin/detail-dokter/delete/{id}',[DetailAdminDokterController::class,'destroy']);
});


// Route Dokter
Route::middleware(['auth','user-role:dokter'])->group(function()
{
    Route::get('/tarifdokter', [TarifDokterController::class, 'showUser'])->name('tarifdokter');
    Route::get('/edit-tarifdokter/{id}', [TarifDokterController::class, 'edit']);

    Route::put('update-tarifdokter', [TarifDokterController::class, 'update']);
    Route::put('update-laporan-tarifdokter/{id}', [TarifDokterController::class, 'updateLaporan'])->name('laporan.update');
});

