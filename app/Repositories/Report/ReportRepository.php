<?php

namespace App\Repositories\Report;

use App\Models\SaleReport;

class ReportRepository
{

    public function ReportById($id)
    {
        try {
            $report = SaleReport::find($id);
            if (!$report) {
                return response()->json(['message' => 'Report not found'],404);
            }

            return response()->json([
                'data' => $report,
                'message' => 'Get report by id'
            ], 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function Report()
    {
        try {
            $reports = SaleReport::all();

            return response()->json([
                'data' => $reports,
                'message' => 'Get all report'
            ]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
