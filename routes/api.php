<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIKoiController;

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
Route::get('kois/{id}', [APIKoiController::class, 'index'])->name('kois.index');
Route::get('kois/search', [APIKoiController::class, 'searchKoi']);

Route::middleware('validate.api_key')->group(function () {
    Route::put('kois/{id}', [APIKoiController::class, 'update'])->name('kois.update');
    Route::delete('kois/{id}', [APIKoiController::class, 'destroy'])->name('kois.destroy');
});




