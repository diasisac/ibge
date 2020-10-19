<?php

namespace App\Repositories;

use App\Models\Estado;

class EstadoRepository
{

  protected $repository;

  public function __construct(Estado $repository)
  {
    $this->repository = $repository;
  }

  public function all($request)
  {

    $estado = Estado::query();

    if ($request->has('id')) {
        $estado->where('id', $request->id);
    }

    if ($request->has('codigo')) {
        $estado->where('codigo', $request->codigo);
    }

    if ($request->has('nome')) {
        $estado->where('nome', 'LIKE', '%' . $request->nome . '%');
    }
    if ($request->has('uf')) {
        $estado->where('uf', $request->uf);
    }

    if ($request->has('id_regiao')) {
        $estado->where('id_regiao', $request->id_regiao);
    }

    $estados = $estado->paginate('10');

    return $estados;
  }

}
