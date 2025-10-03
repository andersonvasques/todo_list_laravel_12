<?php

namespace app\Http\Requests;

use App\Models\Tarefa;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TarefaUniqueRules implements ValidationRule {

    public function __construct() {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $tarefa = Tarefa::where('titulo', $value)->byUser()->first();

        if($tarefa) {
            $fail('Já existe uma tarefa com esse titulo');
        }

    }

}
