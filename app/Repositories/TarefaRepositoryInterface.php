<?php

namespace App\Repositories;

use App\DTO\{
    CreateTarefaDTO,
    UpdateTarefaDTO,
};
use stdClass;

interface TarefaRepositoryInterface
{
    public function getAll(string|null $filter): array;
    public function findOne(string|int $id): stdClass|null;
    public function delete(string|int $id): void;
    public function new(CreateTarefaDTO $dto): stdClass;
    public function update(UpdateTarefaDTO $dto): stdClass|null;
}
