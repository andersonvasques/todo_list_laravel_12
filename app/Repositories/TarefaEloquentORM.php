<?php

namespace App\Repositories;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use stdClass;

class TarefaEloquentORM implements TarefaRepositoryInterface
{
    public function getAll(string|null $filter): array
    {
        return [];
    }
    public function findOne(string|int $id): stdClass|null
    {
        return null;
    }
    public function delete(string|int $id): void
    {

    }
    public function new(CreateTarefaDTO $dto): stdClass
    {
        return new stdClass();
    }
    public function update(UpdateTarefaDTO $dto): stdClass|null
    {
        return null;
    }
}
