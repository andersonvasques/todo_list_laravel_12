<?php

use App\Http\Controllers\Admin\TarefaController;
use Illuminate\Support\Facades\Route;

// Route::post('/login', function () {
//     return dd('login');
// });

Route::apiResource('/tarefas', TarefaController::class);
