<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CetakLaporanNotaris;
use App\Http\Controllers\CetakLaporanPpat;
use App\Http\Controllers\CetakLaporanSuratKeluar;
use App\Http\Controllers\CetakLaporanSuratMasuk;
use App\Http\Livewire\Arsip\CreateArsip;
use App\Http\Livewire\Arsip\Notaris;
use App\Http\Livewire\Arsip\Ppat;
use App\Http\Livewire\Laporan\LaporanNotaris;
use App\Http\Livewire\Laporan\LaporanPpat;
use App\Http\Livewire\Laporan\LaporanSuratKeluar;
use App\Http\Livewire\Laporan\LaporanSuratMasuk;
use App\Http\Livewire\Profil;
use App\Http\Livewire\SuratKeluar\IndexSuratKeluar;
use App\Http\Livewire\SuratMasuk\IndexSuratMasuk;
use App\Http\Livewire\UbahPassword;
use App\Http\Livewire\User\IndexUser;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::get('user', IndexUser::class)->middleware(['can:olah user'])->name('user');

    Route::get('/create-arsip/{idImage}', CreateArsip::class)->middleware(['can:olah arsip'])->name('create-arsip');
    Route::get('/notaris', Notaris::class)->middleware(['can:olah arsip'])->name('notaris');
    Route::get('/ppat', Ppat::class)->middleware(['can:olah arsip'])->name('ppat');

    Route::group(['prefix' => '/suratmasuk', 'as' => 'suratmasuk'], function () {
        Route::get('/', IndexSuratMasuk::class)->middleware(['can:olah surat masuk'])->name('');
    });

    Route::get('/suratkeluar', IndexSuratKeluar::class)->middleware(['can:olah surat keluar'])->name('suratkeluar');
    Route::get('/profil', Profil::class)->name('profil');
    Route::get('/password', UbahPassword::class)->middleware(['can:ubah password'])->name('password');

    Route::group(['prefix' => '/laporan', 'as' => 'laporan'], function () {
        Route::get('/notaris', LaporanNotaris::class)->middleware(['can:lihat laporan'])->name('.notaris');
        Route::get('/ppat', LaporanPpat::class)->middleware(['can:lihat laporan'])->name('.ppat');
        Route::get('/suratmasuk', LaporanSuratMasuk::class)->middleware(['can:lihat laporan'])->name('.suratmasuk');
        Route::get('/suratkeluar', LaporanSuratKeluar::class)->middleware(['can:lihat laporan'])->name('.suratkeluar');
    });

    Route::get('/laporan-notaris/{bulan_awal}/{bulan_akhir}/{tahun}', [CetakLaporanNotaris::class, 'index'])->middleware(['can:cetak laporan'])->name('cetak-notaris');
    Route::get('/laporan-ppat/{bulan_awal}/{bulan_akhir}/{tahun}', [CetakLaporanPpat::class, 'index'])->middleware(['can:cetak laporan'])->name('cetak-ppat');
    Route::get('/laporan-surat-masuk/{bulan_awal}/{bulan_akhir}/{tahun}', [CetakLaporanSuratMasuk::class, 'index'])->middleware(['can:cetak laporan'])->name('cetak-surat-masuk');
    Route::get('/laporan-surat-keluar/{bulan_awal}/{bulan_akhir}/{tahun}', [CetakLaporanSuratKeluar::class, 'index'])->middleware(['can:cetak laporan'])->name('cetak-surat-keluar');
});

require __DIR__ . '/auth.php';
