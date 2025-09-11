<?php

namespace App\Repositories;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Models\Tarefa;
use stdClass;

class TarefaEloquentORM implements TarefaRepositoryInterface
{
    public function __construct(
        protected Tarefa $model
    ){}

    public function get(string|null $filter): array
    {
        return $this->model->where(function ($query) use ($filter) {
            if($filter) {
                $query->where()
            }
        })
    }

    public function show(int $id): object|null
    {
        return null;
    }

    public function delete(string|int $id): void
    {

    }

    public function store(CreateTarefaDTO $dto): stdClass
    {
        return new stdClass();
    }

    public function update(UpdateTarefaDTO $dto): void
    {
        return $this->model->findOrFail()->update();
    }
}
