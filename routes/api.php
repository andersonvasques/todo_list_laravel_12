<?php

use App\Http\Controllers\Admin\TarefaController;
use App\Http\Controllers\Api\TarefaControllerApi;
use Illuminate\Support\Facades\Route;

// Route::post('/login', function () {
//     return dd('login');
// });

Route::apiResource('/tarefas', TarefaControllerApi::class);

// Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
// Route::get('/tarefas/index', [TarefaController::class, 'index'])->name('tarefas.index');
// Route::patch('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
// Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
