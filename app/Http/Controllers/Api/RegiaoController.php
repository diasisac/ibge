<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RegiaoService;
use App\Http\Controllers\Controller;

class RegiaoController extends Controller
{
    protected $regiaoService;

	public function __construct(RegiaoService $regiaoService)
	{
		$this->regiaoService = $regiaoService;
    }

    public function index(Request $request){
        $regioes = $this->regiaoService->listar($request);

        return response()->json($regioes);
    }
}
