<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeTestController;

Route::get('/', [CodeTestController::class, 'dashboard'])->name('home');

Route::get('/screen1', [CodeTestController::class, 'screen1'])->name('screen1');

Route::get('/screen1_get_records', [CodeTestController::class, 'screen1_get_records'])->name('screen1_get_records');

Route::get('/screen2', [CodeTestController::class, 'screen2'])->name('screen2');

Route::get('/screen2_get_images', [CodeTestController::class, 'screen2_get_images'])->name('screen2_get_images');

Route::get('/screen3', [CodeTestController::class, 'screen3'])->name('screen3');

Route::get('/screen3_generate_colour_box', [CodeTestController::class, 'screen3_generate_colour_box'])->name('screen3_generate_colour_box');

Route::get('/screen3_click_box', [CodeTestController::class, 'screen3_click_box'])->name('screen3_click_box');

Route::get('/screen3_new_colour_box', [CodeTestController::class, 'screen3_new_colour_box'])->name('screen3_new_colour_box');
