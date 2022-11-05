<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use App\Repositories\Sale\SaleRepository;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    // stock
    public function stock()
    {
        try {
            $stock = $this->saleRepository->getStock();
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
