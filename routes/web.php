<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CategoryController,
    StateController,
    UserController
};
use App\Http\Middleware\VerifyCsrfToken;

/**
 * Rotas de utilidade
 * [] - /ping - Responde com pong
 * 
 * - Rotas de autenticaçao * Autenticaçao via Token
 * [] - /user/signin - Login
 * [] - /user/signup  - Registro user
 * [] - /user/me --informações do user logado
 * 
 * 
 * - Rotas de Estado
 * [] - /states - Listar estados
 * [] - /categories - Listar categorias
 * 
 * 
 * 
 * - Rotas de Advertises
 * [] - /add/list - Listar anúncios
 * [] - /add/id - dados do anúncio unico
 * [] - /add/add - add anúncio unico
 * [] - /add/id(put) - alterar anúncio 
 * [] - /add/id/delete - deletar anúncio 
 * [] - /add/id/image - deletar imagem do anúncio 
 */


 Route::get('/ping', function(): JsonResponse {
    return response()->json(['Pong' => true]);
 });

 Route::get('/states', [StateController::class, 'index']);

 Route::get('/categories', [CategoryController::class, 'index']);

//  Route::post('/user/signup', [UserController::class, 'signup'])->withoutMiddleware(VerifyCsrfToken::class); //Registro user
 Route::post('/user/signup', [UserController::class, 'signup']); //Registro user
 Route::post('/user/signin', [UserController::class, 'signin']); //login
 Route::get('/user/me', [UserController::class, 'me'])->middleware('auth:sanctum'); //informacoes do user