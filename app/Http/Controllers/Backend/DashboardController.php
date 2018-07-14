<?php

namespace App\Http\Controllers\Backend;

use App\Charts\OrderChart;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends ChartController
{
    protected $chart;

    public function __construct(ChartController $chart)
    {
        $this->chart = $chart;
    }

    public function index(Request $request)
    {
        $months = $this->chart->getMonth();

        $month = $request->month;
        $products = Product::all();

        foreach($products as $product ){
            $qty = OrderProduct::where('product_id', $product->id)->sum('quantity');
            $product->sell = $qty;
        }

        return view('backend/dashboard', compact('products', 'months'));
    }
}
