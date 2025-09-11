<?php

namespace App\Services;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;

class TarefaService
{
    protected $repository;

    /**
     * Summary of __construct
     */
    public function __construct(

    ) {}

    /**
     * Summary of getAll
     * Get all register of the repository
     * @param string|null $filter
     * @return array
     */
    public function get(string|null $filter): array
    {
        return $this->repository->getAll($filter);
    }

    /**
     * Summary of findOne
     * Get only one register of the repository
     * @param string|int $id
     * @return object|null
     */
    public function show(string|int $id): object|null
    {
        return $this->repository->findOne($id);
    }

    /**
     * Summary of new
     * Create a new register in the repository
     * @return object
     */
    public function store(CreateTarefaDTO $dto): object
    {
        return $this->repository->new($dto);
    }

    /**
     * Summary of update
     * Update a register with id
     * @param string $id
     * @param string $titulo
     * @param string $status
     * @param string $id_user
     */
    public function update(UpdateTarefaDTO $dto): void
    {
        $this->repository->update($dto);
    }

    /**
     * Summary of delete
     * Delete a register
     * @param string|int $id
     * @return void
     */
    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }

}
