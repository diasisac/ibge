<?php

namespace App\Services;

use App\Repositories\EstadoRepository;

class EstadoService
{
	public function __construct(EstadoRepository $repository)
	{
		$this->repository = $repository ;
	}

	public function listar($request)
	{
		return $this->repository->all($request);
	}
}
