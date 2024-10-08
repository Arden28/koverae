<?php

use App\Http\Controllers\Api\Subby\PlanController;
use App\Http\Controllers\Api\Demo\DemoController;
use App\Http\Controllers\Api\StartKoverController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('plans', [PlanController::class, 'index']);

Route::post('demo/store', [DemoController::class, 'store']);

Route::post('demo', [DemoController::class, 'index']);

Route::post('/start', [StartKoverController::class, 'store']);
