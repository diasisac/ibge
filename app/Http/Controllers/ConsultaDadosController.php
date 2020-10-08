<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;

class ConsultaDadosController extends Controller
{
    public function index(){
        return view('index');
    }

    public function consultar(Request $request){
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
