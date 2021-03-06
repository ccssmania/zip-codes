<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZipCodeController;

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

Route::get('/import-codes', [ZipCodeController::class, 'import'])->middleware('validate-import')->name('zipcode.import.index');
Route::post('/import-codes', [ZipCodeController::class, 'store'])->middleware('validate-import')->name('zipcode.import');
Route::get('/zip-exists', [ZipCodeController::class, 'exists'])->name('zip-exists');
