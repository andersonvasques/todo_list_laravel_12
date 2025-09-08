<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Tarefa $tarefa)
    {
        $tarefas = $tarefa->all();
        dd($tarefas);

        return view('admin.tarefas.index', compact('tarefas'));
    }
}
