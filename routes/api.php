<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\DefinitionController;

Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'service' => 'backend-api']);
});

// CRUD definitions
Route::get('/definitions', [DefinitionController::class, 'index']);
Route::get('/definitions/{id}', [DefinitionController::class, 'show']);
Route::post('/definitions', [DefinitionController::class, 'store']);
Route::put('/definitions/{id}', [DefinitionController::class, 'update']);
Route::patch('/definitions/{id}', [DefinitionController::class, 'update']);
Route::delete('/definitions/{id}', [DefinitionController::class, 'destroy']);

// search
Route::get('/search', [DefinitionController::class, 'search']);
