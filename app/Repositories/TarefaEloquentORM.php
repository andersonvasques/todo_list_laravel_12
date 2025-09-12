<?php

namespace App\Repositories;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Models\Tarefa;

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
        ->all()
        ->toArray();
    }

    public function show(int $id): object|null
    {
        $tarefa = $this->model->find($id);

        if (!$tarefa) {
            return null;
        }

        return (object) $tarefa->toArray();
    }

    public function delete(int $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function store(CreateTarefaDTO $dto): object
    {
        // $tarefa = $this->model->create(
        //     (array) $dto
        // );

        // return (object) $tarefa->toArray();
        return (object) $this->model->create((array) $dto);
    }

    public function update(UpdateTarefaDTO $dto): void
    {
        $this->model->findOrFail($dto->id)->update((array) $dto);
    }
}
