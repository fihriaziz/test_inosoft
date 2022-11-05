<?php

namespace App\Service;

use App\Repositories\Report\ReportRepository;

class ReportService
{

    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function ReportById($id)
    {
        try {
            $report = $this->reportRepository->ReportById($id);
            return $report;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function Report()
    {
        try {
            $report = $this->reportRepository->Report();
            return $report;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
