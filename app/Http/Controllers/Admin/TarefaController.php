<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TarefaController extends Controller
{
    public function index(Tarefa $tarefa)
    {
        $tarefas = $tarefa->where('id_user', 1)->get();
        // dd($tarefas);

        return response()->json([
            'tarefas' => $tarefas,
        ]);
    }

    public function store(Request $request, Tarefa $tarefa)
    {
        $data = $request->all();
        $data['status'] = 'Aberto';

        $tarefa = $tarefa->create($data);

        return redirect()->route('tarefas.index');
    }

    public function update(Request $request, Tarefa $tarefa, string|int $id)
    {
        $tarefa = $tarefa->find($id);

        if (!$tarefa) {
            return response()->json([
                'error' => 'Tarefa não encontrada'
            ], Response::HTTP_NOT_FOUND);
        }

        $tarefa->update($request->only([
            'titulo',
        ]));

        // return redirect()->route('tarefas.index');

        return response()->json([
            'message' => 'Tarefa atualizada com sucesso',
            'tarefa' => $tarefa,
        ]);
    }
}
