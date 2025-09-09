<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Tarefa $tarefa)
    {
        $tarefas = $tarefa->where('id_user', 1)->get();
        dd($tarefas);
    }

    public function store(Request $request, Tarefa $tarefa)
    {
        $data = $request->all();
        $data['status'] = 'Aberto';

        $tarefa = $tarefa->create($data);

        return redirect()->route('tarefas.index');
    }
}
