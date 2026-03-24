<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ResetPasswordController;
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

//Route untuk reset password
Route::controller(ForgotPasswordController::class)-> group(function(){
    Route::get('forgot-password', 'showForm')->name('password.request');
    Route::post('forgot-password', 'sendResetLink')->name('password.email');
});

Route::controller(ResetPasswordController::class)-> group(function(){
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset_password', 'updatePassword')->name('password.update');
});

//Middleware untuk role customer, admin, staff
Route::group(['middleware' =>['auth', 'checkrole:customer', 'checkstatus']], function(){
    Route::get('/customer', [CustomerController::class, 'customer']);
});

//Route untuk cek role 
Route::group(['middleware'=> ['auth', 'checkrole:admin,staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::group(['middleware'=> ['auth', 'checkrole:admin']], function () {
    Route::get('/user', fn() => 'halaman user');
});

Route::get('/product',[ProdukController::class,'index']); //Read data (menampilkan data)
Route::get('/product/create',[ProdukController::class,'create']); //untuk menampilkan form data
Route::post('/product',[ProdukController::class,'store']); //untuh mengolah data yang telah dikirim dari halaman form data
Route::get('/product/{id}',[ProdukController::class,'show']); // untuk menampilkan deatil data 
Route::get('product/{id}/edit',[ProdukController::class,'edit']);//Update data (untuk mengubah/mengupdate data)
Route::put('/product/{id}',[ProdukController::class,'update']); //untuk mengolah data yang telah dikirim dari form efit data ke db
Route::delete('/product/{id}',[ProdukController::class,'destroy']); //method untuk menghapus data

Route::get('/logout', [AuthController::class, 'logout']);