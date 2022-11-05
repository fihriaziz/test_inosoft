<?php

namespace App\Service;

use App\Models\SaleReport;
use App\Models\Vehicle;
use App\Repositories\Sale\SaleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

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

    public function sale(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'vehicle_id' => 'required',
            'user_id' => 'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        if (!$this->saleRepository->getById($req->vehicle_id)) {
            throw new InvalidArgumentException('Not found id');
        }

        $sell = $this->saleRepository->sale($req);

        $report = $this->saleRepository->createReport($req);
        return $sell;
    }
}
