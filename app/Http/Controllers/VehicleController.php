<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    // sell
    public function store(Request $req)
    {
        try {
            $sale = new Sale();
            $sale->user_id = $req->user_id;
            $sale->vehicle_id = $req->vehicle_id;
            $sale->qty = $req->qty;
            $sale->save();

            $vehicle = $sale->vehicle()->first();
            $vehicle->stock = $vehicle->stock - $sale->qty;

            // return $vehicle;
            $vehicle->save();

            return response()->json([
                'data' => $sale,
                'message' => 'Sell vehicle successfull'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
