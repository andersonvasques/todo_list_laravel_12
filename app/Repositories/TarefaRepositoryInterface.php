<?php

namespace App\Repositories;

use App\DTO\{
    CreateTarefaDTO,
    UpdateTarefaDTO,
};

interface TarefaRepositoryInterface
{
    public function get(string|null $filter): array;
    public function show(int $id): object|null;
    public function delete(int $id): void;
    public function store(CreateTarefaDTO $dto): object;
    public function update(UpdateTarefaDTO $dto): void;
}
