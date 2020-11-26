<?php

namespace App\Http\Controllers;

use App\Services\SalesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     *
     * @var SalesService
     */
    private $salesService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SalesService $salesService)
    {
        $this->salesService = $salesService;
    }

    public function uploadSales(Request $request) : JsonResponse
    {
        return $this->salesService->uploadSales($request);
    }
}
