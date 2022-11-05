<?php

namespace App\Http\Controllers;

use App\Repositories\Report\ReportRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function reportById(Request $req)
    {
        $report = $this->reportRepository->ReportById($req->id);
        return $report;
    }

    public function reportAll()
    {
        $reports = $this->reportRepository->Report();
        return $reports;
    }
}
