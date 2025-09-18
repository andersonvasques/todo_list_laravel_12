<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Support\Facades\Auth;

class Tarefa extends Model
{
    protected $fillable = [
        'titulo',
        'status',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class ,'id_user');
    }

    protected function scopeByUser(Builder $query): Builder
    {
        return $query->where('id_user', Auth::id());
    }
}
