<?php

namespace App\Http\Controllers\Backend;

use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    protected $type;

    public function __construct()
    {
        $this->type = [
            'normal' => 'Khách vãng lai',
            'frequent' => 'Khách hàng thân thuộc',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::all();
        return view('backend.customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->type;
        return view('backend/customer/create')->with('types',$types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'type_id' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|numeric|digits_between:9,12',
            'address' => 'nullable|string',
        ]);

        User::create([
            'name'     => $request->name,
            'type_id'     => $request->type_id,
            'address'     => $request->address,
            'phone'     => $request->phone,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        $types = $this->type;
        return view('backend/customer/edit')->with('customer', $customer)->with('types' ,$types);
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
        $customer = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users,id,'.$id,
            'type_id' => 'required',
            'new_password' => 'nullable|string|min:6|confirmed',
            'phone' => 'nullable|numeric|digits_between:9,12',
            'address' => 'nullable|string',
        ]);

        $customer->name = $request->name;
        $customer->type_id = $request->type_id;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        $customer->save();
        if($request->new_password){
            $customer->password = bcrypt($request->new_password);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $orders = Order::all();
        foreach($orders as $order) {
            $order->customer()->dissociate();
            $order->save();
        }

        $customer->delete();
        return redirect()->route('customer.index');
    }
}
