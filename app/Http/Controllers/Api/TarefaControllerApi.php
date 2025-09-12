<?php

namespace App\Http\Controllers\Api;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTarefa;
use App\Models\Tarefa;
use App\Services\TarefaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TarefaControllerApi extends Controller
{
    public function __construct(
        protected TarefaService $service,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateTarefa $request)
    {
        $tarefa = $this->service->store(
            CreateTarefaDTO::makeFromRequest($request)
        );

        return $tarefa;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarefa = $this->service->show($id);

        return response()->json([
            'tarefa' => $tarefa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateTarefa $request)
    {
        $this->service->update(
            UpdateTarefaDTO::makeFromRequest($request),
        );

        return response()->json([
            'message' => 'Tarefa atualizada com sucesso'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->show($id)) {
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([
            'message' => 'Tarefa excluida com sucesso',
        ]);
    }
}
