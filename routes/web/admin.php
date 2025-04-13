<?php

use App\Http\Controllers\admin\MainController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [MainController::class, 'index'])->middleware(['auth', 'verified']);
