<?php

namespace App\Service;

use App\Models\Sale;
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
        $input = $req->all();
        $validator = Validator::make($input, [
            'vehicle_id' => 'required',
            'user_id' => 'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        if (is_null($this->saleRepository->getById($req->id))) {
            throw new InvalidArgumentException('Not found id');
        }

        $this->saleRepository->sale($req);
        $this->saleRepository->createReport($req);

        return;
    }
}
