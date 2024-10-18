<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PerfumeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('artists', ArtistController::class);
Route::apiResource('perfumes', PerfumeController::class);
Route::get('/test', function () {
    return 'API is working';
});
