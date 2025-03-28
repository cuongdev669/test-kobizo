<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\ExampleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('basic.auth')->group(function () {
    Route::get('test', [ExampleController::class, 'test']);
    Route::post('cal-max-min-diff', [CalculationController::class, 'maxMinDifference']);
    Route::post('cal-sum-up-n', [CalculationController::class, 'sumUpToN']);

});
