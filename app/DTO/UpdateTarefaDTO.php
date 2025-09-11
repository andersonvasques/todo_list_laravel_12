<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateTarefa;

class UpdateTarefaDTO
{
    public function __construct(
        public string $id,
        public string $titulo,
        public string $status,
        public string $id_user,
    ){}

    public static function makeFromRequest(StoreUpdateTarefa $request): self
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
