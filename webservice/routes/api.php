<?php

use App\User;
use App\Conteudo;
use App\Comentario;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/cadastro', "UsuarioController@cadastro");
Route::post('/login', "UsuarioController@login");
Route::middleware('auth:api')->put('/perfil', "UsuarioController@perfil");

Route::get('/testes', function () {
    $user = User::find(1);
    $user2 = User::find(2);
    /*$user->conteudos()->create([
        'titulo'=> 'Conteudo 3',
        'texto'=> 'aqui está o texto',
        'imagem'=> 'url da imagem',
        'link'=> 'link',
        'data'=> '2018-05-10'
    ]);
    return $user->conteudos;//vai listar os conteudos*/
    //adicionar amigos
   /* $user->amigos()->toggle($user2->id);//adiciona se não houver e se houver remove amigo*/

   //add curtidas
    /*$conteudo = Conteudo::find(1);
    $user->curtidas()->toggle($conteudo->id);*/
    //return $conteudo->curtidas->count();
    /*return $conteudo->curtidas;*/

    /*//add comentarios
    $conteudo = Conteudo::find(1);
    $user->comentarios()->create([
        'conteudo_id'=> $conteudo->id,
        'texto'=> 'q coisa',
        'data'=> date('Y-m-d')
    ]);
    $user2->comentarios()->create([
        'conteudo_id'=> $conteudo->id,
        'texto'=> 'tem erro meu',
        'data'=> date('Y-m-d')
    ]);
    return $conteudo->comentarios;*/

});
