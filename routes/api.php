<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\ItemController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {

    //All Routes that share the auth:sanctum middleware
    Route::post('logout', [UserAuthenticationController::class, 'logout']);
});

Route::post('login', [UserAuthenticationController::class, 'login']);
Route::post('register', [UserAuthenticationController::class, 'register']);

Route::get('item', [ItemController::class, 'index'])->name('item.index');
Route::get('item/{item}', [ItemController::class, 'show'])->name('item.show');
Route::post('item', [ItemController::class, 'store'])->name('item.store');
Route::put('item/{item}', [ProductsController::class, 'update'])->name('item.update');
Route::delete('item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');