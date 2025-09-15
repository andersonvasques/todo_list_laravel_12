<?php

namespace App\Http\Controllers\Auth;

use App\DTO\CreateTarefaDTO;
use App\DTO\UpdateTarefaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\StoreTarefa;
use App\Http\Requests\UpdateTarefa;
use App\Models\User;
use App\Services\TarefaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected TarefaService $service
    ){}

    public function login(User $user, Request $request): JsonResponse
    {
        $user = $user->query()->where('name', $request->name)->first();
        $password = $user->query()->where('password', $request->password)->first();

        throw_if(!$user, ValidationException::withMessages(['error' => 'Usuário ou senha inválidos']));
        throw_if(!$password, ValidationException::withMessages(['error' => 'Usuário ou senha inválidos']));

        return response()->json([
            'access' => $user->createToken('token-giga')->plainTextToken
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    }

    public function register(User $user, LoginRequest $request): JsonResponse
    {
        $request = $request->validated();
        $user = $user->create($request);

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso',
            'request' => $request
        ]);

    }

}
