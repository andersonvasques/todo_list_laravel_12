<?php

namespace App\Enums;

enum TarefaStatusEnum: string
{
    case A = 'Aberto';
    case C = 'Concluido';

    public static function fromValue(string $name): string
    {
        foreach (TarefaStatusEnum::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("$name não é um valor válido");
    }
}
