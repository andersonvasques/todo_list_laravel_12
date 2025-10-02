<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TarefaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'titulo'       => $this->titulo,
            'status_label' => $this->status,
            'status'       => $this->status == 'Concluido',
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
