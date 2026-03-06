<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\JenisIuranController;
use App\Http\Controllers\TagihanIuranController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    //tabel anggota
    Route::get('/admin/anggota',[AnggotaController::class,'index'])->name('admin.anggota');
    Route::get('/admin/anggota/create',[AnggotaController::class,'create'])->name('admin.anggota.create');
    Route::post('/admin/anggota',[AnggotaController::class,'store'])->name('anggota.store');
    route::get('/admin/anggota/{id}/edit',[AnggotaController::class,'edit'])->name('anggota.edit');
    Route::put('/admin/anggota/{id}/edit',[AnggotaController::class,'update'])->name('anggota.update');
    Route::delete('/admin/anggota/{id}',[AnggotaController::class,'destroy'])->name('anggota.destroy');
    //tabel jenis iuran
    Route::get('/admin/jenis_iuran',[JenisIuranController::class,'index'])->name('admin.jenis_iuran.index');
    Route::get('/admin/jenis_iuran/create',[JenisIuranController::class,'create'])->name('admin.jenis_iuran.create');
    Route::post('/admin/jenis_iuran',[JenisIuranController::class,'store'])->name('admin.jenis_iuran.store');
    Route::get('/admin/jenis_iuran/{id}/edit',[JenisIuranController::class,'edit'])->name('admin.jenis_iuran.edit');
    Route::put('/admin/jenis_iuran/{id}/edit',[JenisIuranController::class,'update'])->name('admin.jenis_iuran.update');
    Route::delete('/admin/jenis_iuran/{id}',[JenisIuranController::class,'destroy'])->name('admin.jenis_iuran.destroy');
    //tabel tagihan iuran
    Route::get('/admin/tagihan_iuran',[TagihanIuranController::class,'index'])->name('admin.tagihan_iuran.index');
    Route::get('/admin/tagihan_iuran/create',[TagihanIuranController::class,'create'])->name('admin.tagihan_iuran.create');
    Route::post('/admin/tagihan_iuran',[TagihanIuranController::class,"store"])->name('admin.tagihan_iuran.store');
});
// Route::middleware(['auth','role:anggota'])->group(function(){
//     Route::get('/dashboard',[DashboardController::class,'index'])->name('anggota.dashboard');
// });
// Route::middleware(['auth','role:admin'])->group(function(){
//     Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
// });
    