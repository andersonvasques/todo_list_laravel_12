<?php

namespace App\Repositories;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Models\Tarefa;
use App\Models\User;
use App\Repositories\{TarefaRepositoryInterface};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;

class TarefaEloquentORM implements TarefaRepositoryInterface
{
    public function __construct(
        protected Tarefa $model
    ){}

    public function get(array $data, int $perPage = 5): Paginator
    {
        $status = $data['status'] ?? null;
        $titulo = $data['titulo'] ?? null;

        return $this->model->byUser()
                            ->when(isset($status), fn($query) => $query->where('status', 'like', "%$status%"))
                            ->when(isset($titulo), fn($query) => $query->where('titulo', 'like', "%$titulo%"))
                            ->simplePaginate($perPage);
    }

    public function show(int $id): Tarefa
    {
        return $this->model->byUser()
                            ->findOrFail($id);
    }

    public function delete(int $id): bool
    {
        // return $this->model->where('id_user', Auth::id())
        //             ->findOrFail($id)
        //             ->delete();

        return $this->model->byUser()
                            ->findOrFail($id)
                            ->delete();
    }

    public function store(CreateTarefaDTO $dto): object
    {
        return (object) $this->model->create(
            (array) $dto
        )->toArray();
    }

    public function update(UpdateTarefaDTO $dto): bool
    {
        return $this->model->byUser()
                    ->findOrFail($dto->id)
                    ->update(
                        (array) $dto
                    );
    }
}
