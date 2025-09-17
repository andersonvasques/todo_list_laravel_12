<?php

use App\Enums\TarefaStatusEnum;
use App\Http\Controllers\Admin\TarefaController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/tarefas', TarefaController::class)->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/teste', function() {
    dd(array_column(TarefaStatusEnum::cases(), 'name'));
});
