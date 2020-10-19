<?php

namespace App\Repositories;

use App\Models\Municipio;
use App\Models\Estado;

class MunicipioRepository
{

  protected $repository;

  public function __construct(Municipio $repository)
  {
    $this->repository = $repository;
  }

  public function all($request)
  {
    $estado = Estado::where('id_regiao', [$request->regiao])->get();

    $municipio = Municipio::query();

    if ($request->has('id')  && !empty($request->id)) {
        $municipio->where('id', $request->id);
    }

    if ($request->has('codigo') && !empty($request->codigo)) {
        $municipio->where('codigo', $request->codigo);
    }

    if ($request->has('nome') && !empty($request->nome)) {
        $municipio->where('nome', 'LIKE', '%' . $request->nome . '%');
    }else if($request->has('busca') && !empty($request->busca)){
        $municipio->where('nome', 'LIKE', '%' . $request->busca . '%');
    }

    if ($request->has('uf') && !empty($request->uf)) {
        $municipio->where('uf', $request->uf);
    }else if ($request->has('estado') && !empty($request->estado)){
        $municipio->where('uf', $request->estado);
    }

    if ($request->has('regiao') && empty($request->estado) ) {
        $uf_estado=[];
        foreach($estado as $est){
            $uf_estado[] = $est->uf;
        }
        $municipio->whereIn('uf', $uf_estado);
    }

    $municipios = $municipio->paginate('10');

    return $municipios;
  }

}
