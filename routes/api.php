<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('actors', \App\Http\Controllers\ActorController::class);
Route::apiResource('perfumes', \App\Http\Controllers\PerfumeController::class);
