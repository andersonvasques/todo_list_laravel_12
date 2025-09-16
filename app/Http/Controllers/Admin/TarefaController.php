<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTarefa;
use App\Http\Requests\UpdateTarefa;
use App\Services\TarefaService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    public function __construct(
        protected TarefaService $service
    ){}

    public function show(int $id)
    {
        $tarefas = $this->service->show($id);

        return response()->json([
            'tarefas' => $tarefas,
        ]);
    }

    public function store(StoreTarefa $request)
    {
        $tarefa = $this->service->store(
            CreateTarefaDTO::makeFromRequest($request)
        );

        return response()->json([
            'message' => 'Tarefa criada com sucesso',
            'tarefa' => $tarefa
        ]);
    }

    public function update(UpdateTarefa $request)
    {
        $this->service->update(
            UpdateTarefaDTO::makeFromRequest($request),
        );

        return response()->json([
            'message' => 'Tarefa atualizada com sucesso',
            'request' => $request->validated()
        ]);
    }

    public function destroy(int $id)
    {
        if (!$this->service->show($id)) {
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], Response::HTTP_NOT_FOUND);
        }

        $tarefa = $this->service->delete($id);

        return response()->json([
            'message' => 'Tarefa excluida com sucesso',
            'tarefa' => $tarefa
        ]);
    }

}
