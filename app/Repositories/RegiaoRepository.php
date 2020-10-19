<?php

namespace App\Repositories;

use App\Models\Regiao;

class RegiaoRepository
{

  protected $repository;

  public function __construct(Regiao $repository)
  {
    $this->repository = $repository;
  }

  public function all($request)
  {
    $regiao = Regiao::query();

    if ($request->has('id')) {
        $regiao->where('id', $request->id );
    }

    if ($request->has('nome')) {
        $regiao->where('nome', 'LIKE', '%' . $request->nome . '%');
    }

    $regioes = $regiao->paginate('10');

    return $regioes;
  }

}
