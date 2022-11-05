<?php

namespace App\Http\Controllers;

use App\Repositories\Sale\SaleRepository;
use App\Service\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $saleRepository, $vehicleService;

    public function __construct(SaleRepository $saleRepository, VehicleService $vehicleService)
    {
        $this->saleRepository = $saleRepository;
        $this->vehicleService = $vehicleService;
    }

    // stock
    public function stock()
    {
        try {
            $stock = $this->vehicleService->getStock();
            return $stock;
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    // sale
    public function store(Request $req)
    {
        try {
            $sale = $this->saleRepository->sale($req);

            $saleReport = $this->saleRepository->getById($req->vehicle_id);
            if ($saleReport) {
                $saleReport = $this->saleRepository->createReport($req);
            }

            return $sale;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
