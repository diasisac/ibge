<?php

namespace App\Services;

use App\Repositories\RegiaoRepository;

class RegiaoService
{
	public function __construct(RegiaoRepository $repository)
	{
		$this->repository = $repository ;
	}

	public function listar($request)
	{
		return $this->repository->all($request);
	}
}
