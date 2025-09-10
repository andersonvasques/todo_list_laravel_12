<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTarefa;
use App\Models\Tarefa;
use App\Services\TarefaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TarefaController extends Controller
{
    public function __construct(
        protected TarefaService $service
    ){}

    public function index(Request $request)
    {
        // $tarefas = $tarefa->where('id_user', 1)->get();
        $tarefas = $this->service->getAll($request->filter);

        return response()->json([
            'tarefas' => $tarefas,
        ]);
    }

    public function store(StoreUpdateTarefa $request, Tarefa $tarefa)
    {
        $data = $request->validated();
        $data['status'] = 'Aberto';

        $tarefa = $tarefa->create($data);

        // return redirect()->route('tarefas.index');
        return response()->json([
            'message' => 'Tarefa criada com sucesso',
            'tarefa' => $tarefa
        ]);
    }

    public function update(StoreUpdateTarefa $request, Tarefa $tarefa, string|int $id)
    {
        $tarefa = $tarefa->find($id);

        if (!$tarefa) {
            return response()->json([
                'error' => 'Tarefa não encontrada'
            ], Response::HTTP_NOT_FOUND);
        }

        $tarefa->update($request->validated());

        return response()->json([
            'message' => 'Tarefa atualizada com sucesso',
            'tarefa' => $tarefa,
        ]);
    }

    public function destroy(string|int $id)
    {
        $tarefa = $this->service->delete($id);

        return response()->json([
            'message' => 'Tarefa excluida com sucesso',
            'tarefa' => $tarefa
        ]);
    }

}
