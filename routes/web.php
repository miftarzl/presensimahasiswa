<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\AuthDosenController;
use App\Http\Controllers\AuthMahasiswaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordDosenController;

/*
|--------------------------------------------------------------------------
| LOGIN GABUNGAN
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| REGISTER DOSEN
|--------------------------------------------------------------------------
*/

Route::get('/register-dosen', [AuthDosenController::class, 'register'])
    ->name('dosen.register.form');

Route::post('/register-dosen', [AuthDosenController::class, 'store'])
    ->name('dosen.register');

Route::get('/dosen/login', [AuthDosenController::class, 'login'])
    ->name('dosen.login.form');

Route::post('/dosen/login', [AuthDosenController::class, 'authenticate'])
    ->name('dosen.login');
/*
|--------------------------------------------------------------------------
| ROUTE DOSEN
|--------------------------------------------------------------------------
*/

    Route::middleware(['auth:dosen'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        
    /*
    |--------------------------------------------------------------------------
    | CLASS
    |--------------------------------------------------------------------------
    */

    Route::get('/student', [ClassController::class, 'index'])
        ->name('student.index');

    Route::post('/class/store', [ClassController::class, 'store'])
        ->name('class.store');

    Route::get('/class/view/{id}', [ClassController::class, 'view'])
        ->name('class.view');

    Route::post('/class/update/{id}', [ClassController::class, 'update'])
        ->name('class.update');

    Route::get('/class/delete/{id}', [ClassController::class, 'delete'])
        ->name('class.delete');

    /*
    |--------------------------------------------------------------------------
    | STUDENT
    |--------------------------------------------------------------------------
    */

    Route::post('/student/import/{id}', [StudentController::class, 'import'])
        ->name('student.import');

    Route::post('/student/add/{id}', [StudentController::class, 'addStudent'])
        ->name('student.add');

    Route::post('/student/update/{id}', [StudentController::class, 'update'])
        ->name('student.update');

    Route::get('/student/delete/{id}', [StudentController::class, 'delete'])
        ->name('student.delete');

    Route::get('/student/toggle/{id}', [StudentController::class, 'toggle'])
        ->name('student.toggle');
    
    Route::get('/student/reset-password/{id}',[StudentController::class, 'resetPassword'])
        ->name('student.reset.password');

    Route::post('/class/update/{id}',[ClassController::class,'update']
        )->name('class.update');
    
    /*
    |--------------------------------------------------------------------------
    | PRESENSI
    |--------------------------------------------------------------------------
    */

    Route::get('/presensi', [PresensiController::class, 'index'])
        ->name('presensi');

    Route::post('/presensi/store', [PresensiController::class, 'store'])
        ->name('presensi.store');

    Route::get('/presensi/{id}', [PresensiController::class, 'detail'])
        ->name('presensi.detail');

    Route::post('/presensi/update-status/{id}', [PresensiController::class, 'updateStatus'])
        ->name('presensi.updateStatus');

    Route::delete('/presensi/{id}', [PresensiController::class, 'destroy'])
        ->name('presensi.delete');

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan');

    Route::get('/laporan/{id}', [LaporanController::class, 'detail'])
        ->name('laporan.detail');

    Route::get('/laporan/{id}/pdf', [LaporanController::class, 'pdf'])
        ->name('laporan.pdf');

    Route::get('/laporan/{id}/excel', [LaporanController::class, 'excel'])
        ->name('laporan.excel');

});

/*
|--------------------------------------------------------------------------
| FORGOT PASSWORD DOSEN
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [ForgotPasswordController::class,'showResetForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class,'sendOtp'])
    ->name('password.email');

Route::get('/verify-otp', [ForgotPasswordController::class,'showOtpForm'])
    ->name('otp.form');

Route::post('/verify-otp', [ForgotPasswordController::class,'verifyOtp'])
    ->name('otp.verify');

Route::post('/resend-otp', [ForgotPasswordController::class,'resendOtp'])
    ->name('otp.resend');

/*
|--------------------------------------------------------------------------
| FORGOT PASSWORD DOSEN (OTP)
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [ForgotPasswordDosenController::class, 'showResetForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordDosenController::class, 'sendOtp'])
    ->name('password.email');

Route::get('/verify-otp', [ForgotPasswordDosenController::class, 'showOtpForm'])
    ->name('otp.form');

Route::post('/verify-otp', [ForgotPasswordDosenController::class, 'verifyOtp'])
    ->name('otp.verify');

Route::post('/resend-otp', [ForgotPasswordDosenController::class, 'resendOtp'])
    ->name('otp.resend');
    
/*
|--------------------------------------------------------------------------
| ROUTE MAHASISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:student'])->group(function () {

    Route::get('/mahasiswa/dashboard', [AuthMahasiswaController::class, 'dashboard'])
        ->name('mahasiswa.dashboard');

    Route::post('/mahasiswa/logout', [AuthMahasiswaController::class, 'logout'])
        ->name('mahasiswa.logout');

    Route::get('/mahasiswa/ubah-password', [AuthMahasiswaController::class, 'formUbahPassword'])
        ->name('mahasiswa.password.form');

    Route::post('/mahasiswa/ubah-password', [AuthMahasiswaController::class, 'ubahPassword'])
        ->name('mahasiswa.password.update');

    Route::post(
        '/mahasiswa/check-location',
        [AuthMahasiswaController::class, 'checkLocation']
        )->name('mahasiswa.checkLocation');

    Route::post(
    '/mahasiswa/scan-qr',
    [PresensiController::class, 'scanQr']
    )->name('mahasiswa.scanQr');    

    Route::post(
    '/mahasiswa/presensi-online',
    [AuthMahasiswaController::class, 'storePresensiOnline']
    )->name('mahasiswa.presensi.online.store');

    Route::get(
    '/mahasiswa/presensi/{id}',
    [AuthMahasiswaController::class, 'presensi']
    )->name('mahasiswa.presensi');

    Route::get(
    '/mahasiswa/presensi-online/{id}',
    [AuthMahasiswaController::class, 'presensiOnline']
    )->name('mahasiswa.presensi.online');

    Route::get('/mahasiswa/riwayat',
[AuthMahasiswaController::class, 'riwayatPresensi'])
->name('mahasiswa.riwayat');
});

