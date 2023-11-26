<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\BeliController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KeranjangController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\TopupController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('barang',[BarangController::class,'index']);
Route::get('barang/{id}',[BarangController::class,'show']);
Route::post('barang/store',[BarangController::class,'store']);
Route::put('barang/{id}', [BarangController::class, 'update']);
Route::delete('barang/{id}', [BarangController::class, 'destroy']);


Route::get('welcome', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::get('search', function () {
    return view('search');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('keranjang', function () {
    return view('keranjang');
});

Route::get('register',[RegisterController::class,'create']);
Route::post('register',[RegisterController::class,'store'])->name('register');


Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/keranjang/{nama}', [KeranjangController::class, 'index']);
// Route::post('/search/store', [KeranjangController::class, 'store'])->name('keranjang.store');

Route::post('search/store', [KeranjangController::class, 'store'])->name('search/store');
Route::post('keranjang/store', [BeliController::class, 'store'])->name('keranjang/store');
Route::match(['get', 'delete'], 'delete/{id}', [KeranjangController::class, 'destroy']);

Route::get('admin',[BarangController::class,'barangShow']);

Route::get('adminuser',[UserController::class,'index']);

Route::get('admintransaksi',[TransaksiController::class,'index']);
Route::post('topup', [TopupControllers::class, 'topup'])->name('topup');

Route::post('barang/update', [BarangController::class, 'store'])->name('barang/update');

Route::post('user/store',[UserController::class,'store']);
Route::post('transaksi/store',[TransaksiController::class,'store']);
Route::match(['get', 'delete'], 'hapus/{id}', [BarangController::class, 'destroy']);
Route::match(['get', 'delete'], 'hapususer/{id}', [UserController::class, 'destroy']);
Route::match(['get', 'delete'], 'hapusTransaksi/{id}', [TransaksiController::class, 'destroy']);
Route::put('/update/{id}', [BarangController::class, 'update'])->name('update.route');
Route::put('/updateuser/{id}', [UserController::class, 'update'])->name('update.route');
Route::put('/updateTransaksi/{id}', [TransaksiController::class, 'update'])->name('update.route');