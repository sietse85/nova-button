<?php

use Sietse85\NovaButton\Http\Controllers\ButtonController;
use Illuminate\Support\Facades\Route;

Route::post('/{resource}/{resourceId}/{buttonKey}', [ButtonController::class, 'handle']);
Route::post('/action', [ButtonController::class, 'triggerAction']);
