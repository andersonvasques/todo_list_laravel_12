<?php

namespace App\Repositories;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Models\Tarefa;
use App\Repositories\{TarefaRepositoryInterface};
use Illuminate\Http\Response;

class TarefaEloquentORM implements TarefaRepositoryInterface
{
    public function __construct(
        protected Tarefa $model
    ){}

    public function get(string|null $filter): array
    {
        return $this->model->where(function ($query) use ($filter) {
            if($filter) {
                $query->where('titulo', $filter);
            }
        })
        ->get()
        ->toArray();
    }

    public function show(int $id): object|null
    {
        $tarefa = $this->model->find($id);

        if (!$tarefa) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return (object) $tarefa->toArray();
    }

    public function delete(int $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function store(CreateTarefaDTO $dto): object
    {
        $tarefa = $this->model->create(
            (array) $dto
        );

        return (object) $tarefa->toArray();
        // return (object) $this->model->create((array) $dto);
    }

    public function update(UpdateTarefaDTO $dto): void
    {
        $this->model->findOrFail($dto->id)->update((array) $dto);
    }
}
