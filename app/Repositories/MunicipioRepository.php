<?php

namespace App\Repositories;

use App\Models\Municipio;

class MunicipioRepository
{

  protected $repository;

  public function __construct(Municipio $repository)
  {
    $this->repository = $repository;
  }

  public function all($request)
  {

    $municipio = Municipio::query();

    if ($request->has('id')) {
        $municipio->where('id', $request->id);
    }

    if ($request->has('codigo')) {
        $municipio->where('codigo', $request->codigo);
    }

    if ($request->has('nome')) {
        $municipio->where('nome', 'LIKE', '%' . $request->nome . '%');
    }else if($request->has('busca')){
        $municipio->where('nome', 'LIKE', '%' . $request->busca . '%');
    }

    if ($request->has('uf')) {
        $municipio->where('uf', $request->uf);
    }else if ($request->has('estado')){
        $municipio->where('uf', $request->estado);
    }

    $municipios = $municipio->paginate('10');

    return $municipios;
  }

}
