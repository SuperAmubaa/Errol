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

Route::get('/beranda', function () {
    return view('layouts.beranda');
})->middleware('auth')->name('beranda');

Route::get('/', function () {
    return view('frontend.index');
});


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
    // Route::get('/kategori-delete/{id}', [KategoriController::class, 'delete'])->name('kategori-delete');

    Route::resource('/barang', BarangController::class);
    Route::resource('/denda', DendaController::class);
    Route::resource('/peminjaman', PeminjamanController::class);
    Route::get('exportpeminjaman', [PeminjamanController::class, 'peminjamanExcel']);
    Route::get('generate-pdf', [PeminjamanController::class, 'generatePDF']);
    Route::get('peminjaman-pdf', [PeminjamanController::class, 'peminjamanPDF']);
    // Route::resource('/pengembalian', PengembalianController::class); 
});
// Route::post('cekDenda', 'App\Http\Controllers\DendaController@cekDenda');
Route::post('cekDenda', [DendaController::class, 'cekDenda']);

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
