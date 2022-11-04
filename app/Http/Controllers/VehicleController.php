<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use App\Repositories\Sale\SaleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    private $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function getStock()
    {
        return $this->saleRepository->getAll();
    }

    public function sell(Request $req)
    {
        $this->validate($req, [
            'vehicle_id' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
        ]);

        return $this->saleRepository->store($req);
    }

    // public function sell($input)
    // {
    //     $this->validate($input, [
    //         'vehicle_id' => 'required',
    //         'amount' => 'required',
    //         'total' => 'required',
    //         'buyer' => 'required'
    //     ]);

    //     $vehicle = $this->saleRepository->find($input['vehicle_id']);

    //     $this->saleRepository->reduceStock($input['vehicle_id'], $input['amount']);

    //     // Sell
    //     $sell = $this->saleRepository->store($input);

    //     // report
    //     $saleReport = $this->saleRepository->getByVehicle($input['vehicle_id']);

    //     if ($saleReport) {
    //         $this->saleRepository->update($saleReport, $sell);
    //     } else {
    //         $this->saleRepository->store([
    //             'vehicle_id' => $input['vehicle_id'],
    //             'amount' => $input['amount'],
    //             'total' => $input['total'],
    //             'buyer' => $input['buyer']
    //         ]);
    //     }
    //     return $sell;
    // }
}
