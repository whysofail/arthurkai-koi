<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIKoiController;
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\C_Arthurkaikoi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('kois', [APIKoiController::class, 'index'])->name('kois.index');
Route::get('kois/{id}', [APIKoiController::class, 'show'])->name('kois.show');
Route::get('kois/search', [APIKoiController::class, 'searchKoi']);
Route::get('breeders', [APIKoiController::class, 'getBreeders']);
Route::get('varieties', [APIKoiController::class, 'getVarieties']);
Route::get('contact', [APIKoiController::class, 'getContactUs']);


Route::middleware('validate.api_key')->group(function () {
    // Koi operation
    Route::put('kois/{id}', [APIKoiController::class, 'update'])->name('kois.update');
    Route::delete('kois/{id}', [APIKoiController::class, 'destroy'])->name('kois.destroy');

    // User Operation
    Route::post('register', [APIUserController::class, 'register'])->name('api.register');
    Route::post('reset-password', [APIUserController::class, 'resetPassword'])->name('api.reset-password');
});








