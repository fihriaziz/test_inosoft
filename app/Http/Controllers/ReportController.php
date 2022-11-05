<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Report\ReportRepository;
use App\Service\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function reportById(Request $req)
    {
        $report = $this->reportService->ReportById($req->id);
        return $report;
    }

    public function reportAll()
    {
        $reports = $this->reportService->Report();
        return $reports;
    }
}
