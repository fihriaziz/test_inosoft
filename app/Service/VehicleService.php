<?php

namespace App\Service;

use App\Repositories\Sale\SaleRepository;

class VehicleService
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function getStock()
    {
        return $this->saleRepository->getStock();
    }
}
