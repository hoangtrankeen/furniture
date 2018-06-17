<?php

namespace App\Http\Controllers\Backend;

use App\Charts\OrderChart;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends ChartController
{
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {

    }
}
