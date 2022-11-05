<?php

use App\Http\Livewire\Arsip\CreateArsip;
use App\Http\Livewire\Arsip\IndexArsip;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::get('user', IndexUser::class)->middleware(['can:olah user'])->name('user');
    // Route::get('arsip', IndexArsip::class)->middleware(['can:olah arsip'])->name('arsip');

    Route::group(['prefix' => '/arsip', 'as' => 'arsip'], function () {
        Route::get('/', IndexArsip::class)->middleware(['can:olah arsip'])->name('');
        Route::get('/create', CreateArsip::class)->middleware(['can:olah arsip'])->name('.create');
    });
});

require __DIR__ . '/auth.php';
