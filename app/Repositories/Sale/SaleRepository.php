<?php

namespace App\Repositories\Sale;

use App\Models\Sale;
use App\Models\SaleReport;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getByVehicle($id)
    {
        return SaleReport::where('id', $id)->first();
    }



    public function store(Request $req)
    {
        try {

            $sell = Sale::create([
                'vehicle_id' => $req->vehicle_id,
                'user_id' => Auth::user()->id,
                'jumlah' => $req->jumlah,
                'total' => $req->total
            ]);

            $vehicle = $this->find($req->id);

            if (!$vehicle) {
                return response()->json([
                    'message' => 'Vehicle not found'
                ], 404);
            }

            return response()->json([
                'data' => $sell
            ], 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
