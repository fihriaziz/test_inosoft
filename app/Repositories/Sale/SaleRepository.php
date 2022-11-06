<?php

namespace App\Repositories\Sale;

use App\Models\Sale;
use App\Models\SaleReport;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SaleRepository
{
    public function getStock()
    {
        try {
            $stock = Vehicle::all();

            return response()->json(['data' => $stock, 'message' => 'Get stock vehicle'], 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function sale(Request $req)
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

            return $sale;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function getById($id)
    {
        $vehicle = Vehicle::find($id);
        return $vehicle;
    }

    public function createReport(Request $req)
    {
        try {
            $report = SaleReport::create([
                'vehicle_id' => $req->vehicle_id,
                'user_id' => $req->user_id,
                'qty' => $req->qty
            ]);

            return response()->json($report);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
