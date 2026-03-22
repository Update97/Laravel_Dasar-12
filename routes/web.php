<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route untuk login
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

//route untuk register
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

//Route Group untuk Middleware verifikasi
Route::group(['middleware' => ['auth', 'checkrole:customer']], function(){
    Route::get('/verify',[VerificationController::class, 'index'])->name('verify.index');
    Route::post('/verify', [VerificationController::class, 'store'])->name('verify.store');
    Route::get('/verify/{unique_id}',[VerificationController::class, 'show'])->name('verify.show');
    Route::put('/verify/{unique_id}',[VerificationController::class, 'update'])->name('verify.update');
});

//Middleware untuk role customer, admin, staff
Route::group(['middleware' =>['auth', 'checkrole:customer', 'checkstatus']], function(){
    Route::get('/customer', fn ()=> 'halo customer');
});

//Route untuk cek role 
Route::group(['middleware'=> ['auth', 'checkrole:admin,staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::group(['middleware'=> ['auth', 'checkrole:admin']], function () {
    Route::get('/user', fn() => 'halaman user');
});
Route::get('/logout', [AuthController::class, 'logout']);