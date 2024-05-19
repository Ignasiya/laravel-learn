<?php

namespace App\Services;

class CustomLogDbService implements CustomLogServiceInterface
{
    protected $queryBuilder;

    public function __construct($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function rotateLogs(): void
    {
        $this->queryBuilder->where('id', '<', 1000)->delete();
    }
}
