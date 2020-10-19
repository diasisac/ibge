<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\EstadoService;
use App\Http\Controllers\Controller;

class EstadoController extends Controller
{
    protected $estadoService;

	public function __construct(EstadoService $estadoService)
	{
		$this->estadoService = $estadoService;
    }

    public function index(Request $request){
        $estados = $this->estadoService->listar($request);

        return response()->json($estados);
    }
}
