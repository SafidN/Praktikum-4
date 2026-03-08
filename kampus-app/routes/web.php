<?php

use App\Http\Controllers\MatkulController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/matkul', [MatkulController::class, 'index']);
Route::get('/matkul/create', [MatkulController::class, 'create']);
Route::post('/matkul', [MatkulController::class, 'store']);
Route::delete('/matkul/{id}', [MatkulController::class, 'destroy']);
Route::get('/matkul/{id}/edit', [MatkulController::class, 'edit']);
Route::put('/matkul/{id}', [MatkulController::class, 'update']);