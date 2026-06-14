<?php

use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserRegisterController::class, 'register']);
