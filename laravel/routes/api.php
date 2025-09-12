<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemoController;

Route::apiResource('memos', MemoController::class);
