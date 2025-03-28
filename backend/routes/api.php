<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MetaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('basic.auth')->group(function () {
    Route::get('test', [ExampleController::class, 'test']);
    Route::post('cal-max-min-diff', [CalculationController::class, 'maxMinDifference']);
    Route::post('cal-sum-up-n', [CalculationController::class, 'sumUpToN']);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('metas', MetaController::class);
});
