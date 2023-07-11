<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

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
    return view('layouts.beranda');
})->middleware('auth')->name('beranda');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('daftar', [AuthController::class, 'daftar'])->name('daftar');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/user', UserController::class);
  
});

Route::middleware(['auth', 'petugas'])->group(function () {
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/barang', BarangController::class); 
    Route::resource('/denda', DendaController::class); 
    Route::resource('/peminjaman', PeminjamanController::class); 
    Route::resource('/pengembalian', PengembalianController::class); 

    //Peminjaman
    //  Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman-index');
    //  Route::get('peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman/edit');
    //  Route::get('peminjaman/edit/{id}', [PeminjamanController::class, 'update'])->name('peminjaman/update');

});

Route::middleware(['auth', 'anggota'])->group(function () {
    Route::resource('/penyewaan', PenyewaanController::class);
    Route::get('/penyewaan-riwayat', [PenyewaanController::class, 'riwayatPesanan'])->name('penyewaan-riwayat');
    // Route::post('/penyewaan-store', [PenyewaanController::class, 'store'])->name('penyewaan-store');


});






// Route::resource('/barang', 'BarangController');
// Route::resource('/denda', 'DendaController');
// Route::resource('/peminjaman', 'PeminjamanController');



// })->middleware('auth');

// Route::get('login', [AuthController::class, 'login'])->name('login');
// Route::post('login', [AuthController::class, 'authenticating']);
// Route::get('register', [AuthController::class, 'register']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
