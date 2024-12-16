<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::resource('images', ImageController::class)->middleware('can:admin');

    Route::get('admin')->middleware('can:admin')->name('admin');
});
