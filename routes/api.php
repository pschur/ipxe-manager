<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->name('api.v1.')->group(function(){
    Route::get('image/{image}', [\App\Http\Controllers\ImageController::class, 'get_image_url'])->name('image');
});
