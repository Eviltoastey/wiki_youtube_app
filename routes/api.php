<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

// List top videos by country
Route::get('/videos/{countryId}', [VideoController::class, 'getTopVideosByCountry']);

// List top videos
Route::get('/videos', [VideoController::class, 'getTopVideos']);
