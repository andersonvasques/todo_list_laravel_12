<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'id' => $this->id,
            'titulo' => $this->titulo,
            'id_user' => $this->id_user,
            'dt_created' => Carbon::make($this->created_at)
                                        ->tz('America/Sao_Paulo')
                                        ->format('d-m-Y, H:i:s')
        ];
    }
}
