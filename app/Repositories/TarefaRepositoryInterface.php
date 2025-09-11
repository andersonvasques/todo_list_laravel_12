<?php

namespace App\Repositories;

use App\DTO\{
    CreateTarefaDTO,
    UpdateTarefaDTO,
};
use stdClass;

interface TarefaRepositoryInterface
{
    public function get(string|null $filter): array;
    public function show(string|int $id): stdClass|null;
    public function delete(string|int $id): void;
    public function store(CreateTarefaDTO $dto): stdClass;
    public function update(UpdateTarefaDTO $dto): stdClass|null;
}
