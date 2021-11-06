<?php

use App\Http\Controllers\Country\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country', [CountryController::class,'country']);
// Get one data use id
Route::get('country/{id}', [CountryController::class,'countryone']);

// Add Data in table



Route::post('countryCreate', [CountryController::class,'countryCreate']);
