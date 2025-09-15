<?php

namespace App\DTO;

use App\Http\Requests\UpdateTarefa;

class UpdateTarefaDTO
{
    public function __construct(
        public int $id,
        public string $titulo,
        public string $status,
        public int $id_user,
    ){}

    public static function makeFromRequest(UpdateTarefa $request): self
    {
        $data = $request->validated();
        return new self(
            $data['id'],
            $data['titulo'],
            $data['status'],
            $data['id_user'],
        );
    }
}
