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
use App\Http\Controllers\Auth\AdminChartController;
use App\Http\Controllers\Auth\PolaTarifController;
use App\Http\Controllers\Auth\DetailAntrianController;
use App\Http\Controllers\Auth\LoketController;
use App\Http\Controllers\Auth\TarifDokterController;
use App\Http\Controllers\FileUpload;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
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

    Route::get('tambahdokter', [AddDokterController::class, 'create'])
            ->name('tambahdokter');

    Route::post('tambahdokter', [AddDokterController::class, 'store']);

    Route::get('tambahklinik', [AddKlinikController::class, 'create'])
    ->name('tambahklinik');

    Route::post('tambahklinik', [AddKlinikController::class, 'store']);

    Route::get('polatarif', [PolaTarifController::class, 'create'])
    ->name('polatarif');

    Route::post('polatarif', [PolaTarifController::class, 'store']);

    Route::get('/admin', [AdminController::class, 'showAdmin'])->name('adminDash');

    Route::get('/tarifdokter', [TarifDokterController::class, 'showUser'])->name('tarifdokter');
    Route::get('/edit-tarifdokter/{id}', [TarifDokterController::class, 'edit']);

    Route::put('update-tarifdokter', [TarifDokterController::class, 'update']);

    Route::get('loket', [LoketController::class, 'showKlinik'])->name('loket');
    Route::get('/edit-loket/{id}', [LoketController::class, 'edit']);
    Route::put('update-loket', [LoketController::class, 'update']);

    Route::put('update-tarifdokter', [TarifDokterController::class, 'update']);

    Route::get('/detail', [DetailAntrianController::class, 'show'])->name('detail');

    Route::get('/upload-file', [FileUpload::class, 'createForm']);
    Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

});
