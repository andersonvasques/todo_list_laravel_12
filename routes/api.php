<?php

use App\Http\Controllers\Admin\TarefaController;
use Illuminate\Support\Facades\Route;

// Route::post('/login', function () {
//     return dd('login');
// });

Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/index', [TarefaController::class, 'index'])->name('tarefas.index');
Route::patch('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
