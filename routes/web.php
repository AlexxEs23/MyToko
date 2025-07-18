<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('index');
    })->name('login');
    Route::post('/loginProses',[AuthController::class, 'loginPost']);
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);   

    Route::middleware('role:admin')->group(function(){
        //PENGGUNA
         Route::get('/pengguna', [AuthController::class, 'user']);
         Route::get('/tambah_pengguna', [AuthController::class, 'tambah_pengguna']);
         Route::post('/tambah_pengguna/proses', [AuthController::class, 'proses_tambah_pengguna']);
         Route::delete('/hapus_pengguna', [AuthController::class, 'hapus_pengguna']);

         //PRODUK
        Route::get('/produk', [HomeController::class, 'produk']);
        Route::get('/search', [HomeController::class, 'searchProduk']);
        Route::get('/tambah_produk', [HomeController::class, 'tambah_produk']);
        Route::post('/tambah_produk_proses', [HomeController::class, 'tambah_produk_proses']);
        Route::get('/edit_produk/{id}', [HomeController::class, 'edit_produk']);
        Route::post('/edit_produk_proses', [HomeController::class, 'edit_produk_proses']);
        Route::delete('/hapus_produk',[HomeController::class, 'hapus_produk']);

         //LAPORAN
         Route::get('/laporan',[HomeController::class,'laporan']);
         Route::get('/filter-laporan',[HomeController::class,'filterLaporan']);

    });

     //TRANSAKSI
    Route::get('/transaksi',[HomeController::class, 'transaksi']);
    Route::get('get-barang/{id}',[HomeController::class, 'getProduk']);
    Route::get('get-member/{id}',[HomeController::class, 'getMember']);
    Route::post('/simpan-transaksi', [HomeController::class, 'simpanTransaksi']);

    //PELANGGAN
    Route::get('/pelanggan',[HomeController::class, 'pelanggan']);
    Route::get('/tambah_pelanggan',[HomeController::class, 'tambah_pelanggan']);
    Route::post('/tambah_pelanggan_proses',[HomeController::class, 'tambah_pelanggan_proses']);
    Route::get('/edit_pelanggan/{id}',[HomeController::class, 'edit_pelanggan']);
    Route::post('/edit_pelanggan_proses',[HomeController::class, 'edit_pelanggan_proses']);
    Route::delete('/hapus_pelanggan',[HomeController::class, 'hapus_pelanggan']);

    //DETAIL PENJUALAN
    Route::get('/penjualan',[HomeController::class, 'penjualan']);
    Route::get('/detail_penjualan/{id}',[HomeController::class, 'detail_penjualan']);
    Route::delete('/hapus_penjualan', [HomeController::class, 'hapus_penjualan']);
    Route::get('/search_penjualan',[HomeController::class, 'search']);

   
});
