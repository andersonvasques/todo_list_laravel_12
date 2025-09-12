<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateTarefa;

class CreateTarefaDTO
{
    public function __construct(
        public string $titulo,
        public string $status,
        public int $id_user,
    ){}

    public static function makeFromRequest(StoreUpdateTarefa $request): self
    {
        $data = $request->validated();
        return new self(
            $data['titulo'],
            $data['status'] = 'Aberto',
            $data['id_user'],
        );
    }
}
