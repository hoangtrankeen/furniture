<?php

namespace App\Http\Controllers\Backend;

use App\Charts\OrderChart;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chartOrderAmount(Request $request)
    {
        $month = $request->month;
        $order = [];

        $list = $this->getDateInMonth($month);

        foreach($list as $date)
        {
            $order[] = Order::whereDate('created_at', '=', $date)
                ->where('status',6)->sum('billing_total');
        }

        $chart = new OrderChart();
        // Add the dataset (we will go with the chart template approach)
        $chart->dataset('vnd', 'line', $order)
        ->options([
            'borderColor' =>'#ff0000',
            'legend' => [
                'display' => false
            ]
        ]);


        $chart->labels($list)
            ->options([
                'legend' => [
                    'display' => false
                ]
            ]);

        $months = $this->getMonth();

        return view('backend/order/chart', ['chart' => $chart])->with(['months' => $months]);

    }

    public function chartOrderQuantity(Request $request)
    {
        $month = $request->month;
        $order = [];

        $list = $this->getDateInMonth($month);

        foreach($list as $date)
        {
            $order[] = Order::whereDate('created_at', '=', $date)
                ->get()
                ->count();
        }

        $chart = new OrderChart();
        // Add the dataset (we will go with the chart template approach)
        $chart->dataset('order', 'line', $order)
            ->options([
                'borderColor' =>'#ff0000',
                'legend' => [
                    'display' => false
                ]
            ]);


        $chart->labels($list)
            ->options([
                'legend' => [
                    'display' => false
                ]
            ]);

        $months = $this->getMonth();

        return view('backend/order/chart-quantity', ['chart' => $chart])->with(['months' => $months]);
    }

    public function getDateInMonth($month)
    {
        $list=array();
        for($d=1; $d<=31; $d++)
        {
            $time=mktime(12, 0, 0, date($month), $d, date('Y'));
            if (date('m', $time)==date('m'))
                $list[]=date('Y-m-d', $time);
        }

        return $list;
    }

    public function getMonth()
    {
        $months = $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
        return $months;
    }

}
