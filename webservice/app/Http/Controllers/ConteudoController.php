<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conteudo;

class ConteudoController extends Controller
{
    public function lista(Request $request)
    {
        $conteudos = Conteudo::with('user')->orderBy('data','DESC')->paginate(5);

        return ['status'=>true,"conteudos"=>$conteudos];
    }

    public function adicionar(Request $request)
    {
        $data = $request->all();//guardar todos os dados do formulario
        $user = $request->user();//acesso ao usuario q está logado; feito por token

        //validação
        $conteudo = new Conteudo;//criou obj de conteudo
        $conteudo->titulo = $data['titulo'];//tem q ser array
        $conteudo->texto = $data['texto'];
        $conteudo->link = $data['link'] ? $data['link'] : '#';
        $conteudo->imagem = $data['imagem'] ? $data['imagem'] : '#';
        $conteudo->data = date('Y-m-d H:i:s');

        $user->conteudos()->save($conteudo);//usou save ao invés de create

        return ['status'=>true, 'conteudos'=>$user->conteudos];//vai listar os conteudos*/
    }
}
