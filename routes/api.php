<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('item', [ItemController::class, 'index'])->name('item.index');
Route::get('item/{item}', [ItemController::class, 'show'])->name('item.show');
Route::post('item', [ItemController::class, 'store'])->name('item.store');
Route::put('item/{item}', [ItemController::class, 'update'])->name('item.update');
Route::delete('item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');