<?php

use Illuminate\Support\Facades\Route;
use Yuraplohov\LaravelExample\Http\Controllers\ItemsController;

Route::get('items', [ItemsController::class, 'index']);