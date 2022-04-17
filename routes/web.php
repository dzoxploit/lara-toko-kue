<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('produk/index', [ProdukController::class, 'index'])->name('produk.index');
Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::get('produk/show/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::post('produk/update_data/{id}', [ProdukController::class, 'update_data'])->name('produk.update_data');
Route::delete('produk/delete_data/{id}', [ProdukController::class, 'delete_data'])->name('produk.delete_data');


Route::get('pelanggan/index', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::get('pelanggan/show/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::post('pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');


Route::get('transaksi/index', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('transaksi/show/{id}', [TransaksiController::class, 'edit'])->name('transaksi.show');
Route::post('transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');