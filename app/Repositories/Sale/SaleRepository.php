<?php

namespace App\Repositories\Sale;

use App\Models\Sale;
use App\Models\Vehicle;

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

    public function find($id)
    {
        return Vehicle::find($id);
    }

    public function reduceStock($id, $input)
    {
        $vehicle = $this->find($id);
        $vehicle->stock -= $input;
        $vehicle->save();
    }
}
