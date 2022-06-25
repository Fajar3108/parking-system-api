<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/blocks')->controller(BlockController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{block}', 'show');
});

Route::controller(TransactionController::class)->group(function () {
    Route::post('/start-parking', 'start_parking');
    Route::patch('/stop-parking', 'stop_parking');
});
