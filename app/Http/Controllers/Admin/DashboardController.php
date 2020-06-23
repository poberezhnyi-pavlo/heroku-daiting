<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use Illuminate\Http\Response;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{

    /**
     * @var DashboardService
     */
    protected $dashboardService;

    /**
     * DashboardController constructor.
     * @param DashboardService $dashboardService
     */
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $data = $this->dashboardService->getUserData();

        return response()->view('admin.dashboard.index', [
            'data' => $data,
        ]);
    }
}
