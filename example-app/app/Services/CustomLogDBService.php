<?php

namespace App\Services;

use App\Services\CustomLogServiceInterface;

class CustomLogDBService implements CustomLogServiceInterface
{
  protected $queryBuilder;

  public function __construct($queryBuilder)
  {
    $this->queryBuilder = $queryBuilder;
  }
  public function rotateLogs()
  {
    //
    $this->queryBuilder->where('id', '<', 1000)->delete();
  }
}
