<?php

namespace App\Repositories\Sale;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleRepository
{
    public function getAll()
    {
        $sale = Sale::all();
        return response()->json([
            'data' => $sale,
            'message' => 'Get all data'
        ], 200);
    }

    public function sell(Request $req)
    {
        try {
            $sale = new Sale();
            $sale->user_id = $req->user_id;
            $sale->vehicle_id = $req->vehicle_id;
            $sale->qty = $req->qty;
            $sale->save();

            $vehicle = $sale->vehicle()->first();
            $vehicle->stock = $vehicle->stock - $sale->qty;
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
