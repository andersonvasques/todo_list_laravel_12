<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\TarefaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected TarefaService $service
    ){}

    public function login(Request $request): JsonResponse
    {
        $user = User::where('name', $request->name)->first();

        throw_if(!$user, ValidationException::withMessages([
            'error' => 'Usuário ou senha inválidos'
        ]));

        throw_if(!Hash::check($request->password, $user->password), ValidationException::withMessages([
            'error' => 'Usuário ou senha inválidos'
        ]));

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
        $request['password'] = Hash::make($request['password']);
        $user = $user->create($request);

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso',
            'request' => $request
        ]);

    }

    public function profile(): JsonResource
    {
        return new UserResource(Auth::user());
    }

}
