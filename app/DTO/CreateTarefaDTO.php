<?php

namespace App\DTO;

use App\Http\Requests\StoreTarefa;
use Illuminate\Support\Facades\Auth;

class CreateTarefaDTO
{
    public function __construct(
        public string $titulo,
        public string $status,
        public int $id_user,
    ){}

    public static function makeFromRequest(StoreTarefa $request): self
    {
        // dd(Auth::id());
        $data = $request->validated();
        return new self(
            $data['titulo'],
            $data['status'] = 'Aberto',
            $data['id_user'] = Auth::id(),
        );
    }
}
