<?php

namespace App\Http\Controllers\Backend;

use App\Mail\SendOrderConfirmation;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\OrderStatus;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $data['orders'] = Order::all();
        $data['statuses'] = OrderStatus::all();

        if($request->has('sort')){
            $data['orders'] = Order::where('status', $request->sort)->get();

            if($request->sort == 0 ){
                $data['orders'] = Order::all();
            }
        }
        return view ('backend/order/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['order'] = Order::find($id);
        $data['statuses'] = OrderStatus::all();
        return view('backend/order/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $statuses = OrderStatus::all();
        foreach($statuses as $status){
            if($request->has('status_'.$status->id)){
                $order->status = $status->id;
                $order->save();
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendEmailOrder(Request $request)
    {
        $order = Order::find($request->order_id);

        foreach ($order->products as $product)
        {
            $product->final_price = Product::getFinalPrice($product);
        }

        $details =[
            'order_id' => $order->id,
            'billing_email' => $order->billing_email,
            'billing_name' => $order->billing_name,
            'billing_address' => $order->billing_address,
            'billing_city' => $order->billing_city,
            'billing_province' => $order->billing_province,
            'billing_postalcode' => $order->billing_postalcode,
            'billing_phone' => $order->billing_phone,
            'billing_total' => $order->billing_total,
            'payment_method' => $order->payment_methods->name,
            'created_at' => $order->created_at,
            'ordered_products' => $order->products,
            'customer' => auth()->user() ? auth()->user()->name : $order->billing_name,
            'products' => $order->products,
            'status' => $order->statuses->name
        ];

        Mail::to($details['billing_email'])->send(new SendOrderConfirmation($details));

        return redirect()->back()->with('success', 'Order Email has been sent successfully!');
    }
}
