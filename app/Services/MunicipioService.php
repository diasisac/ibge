<?php

namespace App\Services;

use App\Repositories\MunicipioRepository;

class MunicipioService
{
	public function __construct(MunicipioRepository $repository)
	{
		$this->repository = $repository;
	}

	public function listar($request)
	{
		return $this->repository->all($request);
	}
}
