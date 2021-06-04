<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json(['message' => sprintf('Service working in port %s', env('SERVER_PORT_APP'))]);
});

Route::apiResource('user', UserController::class);
