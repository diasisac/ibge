<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipio;

class ConsultaDadosController extends Controller
{
    public function index(Request $request){
        $dados = [
            'regiao' => $request->regiao,
            'estado' => $request->estado,
            'busca' => $request->busca
        ];

        $municipios = empty($dados['estado']) ? Municipio::where('nome', 'LIKE', '%'.$dados['busca'].'%')
        ->Orwhere('uf',$dados['estado'])->get() :
        Municipio::where('nome', 'LIKE', '%'.$dados['busca'].'%')
        ->where('uf',$dados['estado'])->get() ;
        return view('index')->with('municipios',$municipios);
    }
}
