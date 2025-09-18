<?php

namespace App\Repositories;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Tarefa;
use App\Models\User;
use App\Repositories\{TarefaRepositoryInterface};
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;

class TarefaEloquentORM implements TarefaRepositoryInterface
{
    public function __construct(
        protected Tarefa $model
    ){}

    public function get(array $data, int $perPage = 5)
    {
        $status = $data['status'] ?? null;
        $titulo = $data['titulo'] ?? null;

        return $this->model->where('id_user', Auth::id())
            ->when(isset($status), fn($query) => $query->where('status', 'like', "%$status%"))
            ->when(isset($titulo), fn($query) => $query->where('titulo', 'like', "%$titulo%"))
            ->simplePaginate($perPage);
    }

    public function show(int $id): object|null
    {

        $tarefa = $this->model->where('id_user', Auth::id())
                                ->find($id);

        throw_if(!$tarefa, ValidationException::withMessages([
            'error' => 'Tarefa não encontrada'
        ]));

        return response()->json([
            'tarefa' => $tarefa
        ]);

    }

    public function delete(int $id): bool
    {
        return $this->model->where('id_user', Auth::id())
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
        return $this->model->where('id_user', Auth::id())
                    ->findOrFail($dto->id)
                    ->update(
                        (array) $dto
                    );
    }
}
