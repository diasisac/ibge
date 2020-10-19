<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\MunicipioService;
use App\Http\Controllers\Controller;

class MunicipioController extends Controller
{
    protected $municipioService;

	public function __construct(MunicipioService $municipioService)
	{
		$this->municipioService = $municipioService;
    }

    public function index(Request $request){

        $municipios = $this->municipioService->listar($request);
        return response()->json($municipios);
    }
}
