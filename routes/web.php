<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SignatureController;

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

Auth::routes();

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::controller(SignatureController::class)->group(function () {
    Route::get('signature', 'index')->name('signature.index');
    Route::post('signature', 'store')->name('signature.store');
    Route::get('signature/create', 'create')->name('signature.create');
    Route::get('signature/{id}', 'show')->name('signature.show');
    Route::get('signature/{id}/edit', 'edit')->name('signature.edit');
    Route::put('signature/{id}/update', 'update')->name('signature.update');
    Route::get('signature/{id}/destroy', 'destroy')->name('signature.destroy');
    Route::get('signature/{id}/download', 'download')->name('signature.download');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
