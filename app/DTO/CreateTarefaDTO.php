<?php

namespace App\DTO;

use App\Enums\TarefaStatusEnum;
use App\Http\Requests\StoreTarefa;
use Illuminate\Support\Facades\Auth;

class CreateTarefaDTO
{
    public function __construct(
        public string $titulo,
        public TarefaStatusEnum $status,
        public int $id_user,
    ){}

    public static function makeFromRequest(StoreTarefa $request): self
    {
        $data = $request->validated();
        return new self(
            $data['titulo'],
            TarefaStatusEnum::A,
            $data['id_user'] = Auth::id(),
        );
    }
}
