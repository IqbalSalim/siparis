<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Livewire\Arsip\CreateArsip;
use App\Http\Livewire\Arsip\IndexArsip;
use App\Http\Livewire\SuratMasuk\IndexSuratMasuk;
use App\Http\Livewire\User\IndexUser;
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
    // Route::get('arsip', IndexArsip::class)->middleware(['can:olah arsip'])->name('arsip');

    Route::group(['prefix' => '/arsip', 'as' => 'arsip'], function () {
        Route::get('/', IndexArsip::class)->middleware(['can:olah arsip'])->name('');
        Route::get('/create/{idImage}', CreateArsip::class)->middleware(['can:olah arsip'])->name('.create');
    });

    Route::group(['prefix' => '/suratmasuk', 'as' => 'suratmasuk'], function () {
        Route::get('/', IndexSuratMasuk::class)->middleware(['can:olah surat masuk'])->name('');
    });
});

require __DIR__ . '/auth.php';
