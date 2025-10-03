<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Helpers\PaginatedResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTarefa;
use App\Http\Requests\UpdateTarefa;
use App\Http\Resources\TarefaResource;
use App\Services\TarefaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class TarefaController extends Controller
{
    public function __construct(
        protected TarefaService $service
    ){}

    public function index(Request $request): JsonResource
    {
        $perPage = $request->input('perPage', 20);

        $paginator = $this->service->get($request->all(), $perPage);

        return TarefaResource::collection($paginator);
    }

    public function show(int $id): JsonResource
    {
        return new TarefaResource($this->service->show($id));
    }

    public function store(StoreTarefa $request): JsonResource
    {
        $tarefa = $this->service->store(CreateTarefaDTO::makeFromRequest($request));

        return new TarefaResource($tarefa);
    }

    public function update(UpdateTarefa $request): Response
    {
        $this->service->update(UpdateTarefaDTO::makeFromRequest($request));

        return response()->noContent();
    }

    public function destroy(int $id): Response
    {
        // if (!$this->service->show($id)) {
        //     return response()->json([
        //         'message' => 'Tarefa não encontrada'
        //     ], Response::HTTP_NOT_FOUND);
        // }

        $this->service->delete($id);

        return response()->noContent();
    }

}
