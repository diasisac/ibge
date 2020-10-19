<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MunicipioService;


class ConsultaDadosController extends Controller
{
    protected $municipioService;

	public function __construct(municipioService $municipioService)
	{
		$this->municipioService = $municipioService;
    }

    public function index(){
        return view('index');
    }

    public function consultar(Request $request){
        $municipios = $this->municipioService->listar($request);

        return view('index', compact('municipios'));
    }
}
