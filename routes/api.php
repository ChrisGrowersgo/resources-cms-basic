<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request): JsonResponse {
    try {
        $user = $request->user();
        return response()->json($user); 
        //return $request->user();
    } catch (Throwable $e){
        return response()->json([
            'error'=> $e->getMessage(),
        ]);
    }
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    try {
        // Validar las credenciales de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'token_name' => 'required|string|max:255',
        ]);

        // Buscar el usuario por correo
        $user = \App\Models\User::where('email', $request->email)->first();

        // Verificar que el usuario existe y las credenciales coinciden
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        // Crear un token para el usuario
        $token = $user->createToken($request->token_name);

        // Devolver el token en texto plano
        return response()->json(['token' => $token->plainTextToken]);
    } catch (\Throwable $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});