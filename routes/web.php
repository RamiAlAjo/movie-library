<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;

Route::resource('movies', MovieController::class);
Route::resource('actors', ActorController::class);
