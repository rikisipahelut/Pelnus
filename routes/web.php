<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KopsController;
use App\Http\Controllers\StaffopsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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


// Route::get('/', function () {
//     return view('welcome');
// });

// Route untuk User Biasa atau Home
Route::get('/',[HomeController::class,'index']);
Route::post('/cari',[HomeController::class,'cari']);
Route::get('/cari',function(){
    return redirect('/');
});
//Route untuk Autentifikasi
Route::get('/auth',[AuthController::class,'auth'])->name('login');
Route::post('/auth/login',[AuthController::class,'login']);
Route::get('/auth/logout',[AuthController::class,'logout'])->name('logout');

// Route untuk kepala operasi Laravel v8
Route::middleware('kops')->group(function(){
    Route::get('/kops/dashboard',[KopsController::class,'dashboard'])->name('kopsdashboard');
    Route::get('/kops/tb_akun',[KopsController::class,'tb_akun']);
    Route::get('/kops/tb_kapal',[KopsController::class,'tb_kapal']);
    Route::get('/kops/tb_bl',[KopsController::class,'tb_bl']);
    Route::get('/kops/tb_kontener',[KopsController::class,'tb_kontener']);
    Route::get('/kops/tb_laporan',[KopsController::class,'tb_laporan']);
    Route::get('/kops/tb_pemilik',[KopsController::class,'tb_pemilik']);
    Route::get('/kops/tb_karyawan',[KopsController::class,'tb_karyawan']);
    Route::get('/kops/form_tambah_kapal',[KopsController::class,'tambah_kapal']);
    Route::get('/kops/form_tambah_bl/{kd_kapal}',[KopsController::class,'tambah_bl']);
    Route::get('/kops/form_tambah_kontener/{no_bl}/{kd_kapal}/{kd_pemilik}',[KopsController::class,'tambah_kontener']);
    Route::get('/kops/form_tambah_karyawan',[KopsController::class,'tambah_karyawan']);
    Route::get('/kops/form_tambah_pemilik',[KopsController::class,'tambah_pemilik']);
    Route::get('/kops/form_tambah_akun',[KopsController::class,'tambah_akun']);
    Route::post('/kops/form_tambah_kapal',[KopsController::class,'store_kapal']);
    Route::post('/kops/form_tambah_bl',[KopsController::class,'store_bl']);
    Route::post('/kops/form_tambah_kontener',[KopsController::class,'store_kontener']);
    Route::post('/kops/form_tambah_pemilik',[KopsController::class,'store_pemilik']);
    Route::post('/kops/tambah_karyawan',[KopsController::class,'store_karyawan']);
    Route::post('/kops/form_tambah_akun',[KopsController::class,'store_akun']);
    Route::delete('/kops/tb_akun/{akun}',[KopsController::class,'destroy_akun']);
    Route::delete('/kops/tb_pemilik/{pemilik}',[KopsController::class,'destroy_pemilik']);
    Route::delete('/kops/tb_karyawan/{karyawan}',[KopsController::class,'destroy_karyawan']);
    Route::delete('/kops/tb_kontener/{kontener}',[KopsController::class,'destroy_kontener']);
    Route::delete('/kops/tb_bl/{bl}',[KopsController::class,'destroy_bl']);
    Route::delete('/kops/tb_kapal/{kapal}',[KopsController::class,'destroy_kapal']);
    Route::get('/kops/form_ubah_kapal/{kapal}',[KopsController::class,'ubah_kapal']);
    Route::get('/kops/form_ubah_bl/{bl}',[KopsController::class,'ubah_bl']);
    Route::get('/kops/form_ubah_kontener/{kontener}',[KopsController::class,'ubah_kontener']);
    Route::get('/kops/form_ubah_karyawan/{karyawan}',[KopsController::class,'ubah_karyawan']);
    Route::get('/kops/form_ubah_pemilik/{pemilik}',[KopsController::class,'ubah_pemilik']);
    Route::get('/kops/form_ubah_akun/{akun}',[KopsController::class,'ubah_akun']);
    Route::patch('/kops/update_kapal/{kapal}',[KopsController::class,'update_kapal']);
    Route::patch('/kops/update_bl/{no_bl}',[KopsController::class,'update_bl']);
    Route::patch('/kops/update_kontener/{kontener}',[KopsController::class,'update_kontener']);
    Route::patch('/kops/update_karyawan/{karyawan}',[KopsController::class,'update_karyawan']);
    Route::patch('/kops/update_pemilik/{pemilik}',[KopsController::class,'update_pemilik']);
    Route::patch('/kops/update_akun/{akun}',[KopsController::class,'update_akun']);
    Route::get('/kops/charts',[KopsController::class,'charts']);
    
});

// route untuk staff operasi
Route::middleware('staffops')->group(function(){

    Route::get('/staffops/dashboard',[StaffopsController::class,'dashboard']);
    Route::get('/staffops/tb_kapal',[StaffopsController::class,'tb_kapal']);
    Route::get('/staffops/tb_bl',[StaffopsController::class,'tb_bl']);
    Route::get('/staffops/tb_kontener',[StaffopsController::class,'tb_kontener']);
    Route::get('/staffops/tb_laporan',[StaffopsController::class,'tb_laporan']);
    Route::get('/staffops/tb_pemilik',[StaffopsController::class,'tb_pemilik']);
    Route::get('/staffops/tb_karyawan',[StaffopsController::class,'tb_karyawan']);
    Route::get('/staffops/form_tambah_laporan/{kd_kontener}/{no_kontener}',[StaffopsController::class,'tambah_laporan']);
    Route::post('/staffops/form_tambah_laporan',[StaffopsController::class,'store_laporan']);
    Route::delete('/staffops/tb_laporan/{laporan}',[StaffopsController::class,'destroy_laporan']);
    Route::get('/staffops/form_ubah_laporan/{laporan}',[StaffopsController::class,'ubah_laporan']);
    Route::patch('/staffops/update_laporan/{laporan}',[StaffopsController::class,'update_laporan']);
});

// route untuk administrasi
Route::middleware('admin')->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/tb_kapal',[AdminController::class,'tb_kapal']);
    Route::get('/admin/tb_bl',[AdminController::class,'tb_bl']);
    Route::get('/admin/tb_kontener',[AdminController::class,'tb_kontener']);
    Route::get('/admin/tb_laporan',[AdminController::class,'tb_laporan']);
    Route::get('/admin/tb_pemilik',[AdminController::class,'tb_pemilik']);
    Route::get('/admin/tb_karyawan',[AdminController::class,'tb_karyawan']);
});