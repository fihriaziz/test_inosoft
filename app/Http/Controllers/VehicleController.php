<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
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
            $sale = $this->vehicleService->sale($req);
            return response()->json([
                'data' => $sale
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
