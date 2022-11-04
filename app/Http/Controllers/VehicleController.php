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

    // sell
    public function store(Request $req)
    {
        try {
            return $this->saleRepository->sell($req);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
