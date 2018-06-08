<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountEdit()
    {
        return view('frontend/customer-edit');
    }

    /**
     * change Customer information
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function accountUpdate(Request $request)
    {

        if($request->has('change-password')){
            if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error","Mật khẩu hiện tại không đúng. Xin vui lòng nhập lại.");
            }

            if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","Mật khẩu mới không thể giống mật khẩu hiện tại. Xin vui lòng chọn mật khẩu khác.");
            }

            $request->validate([
                'name' => 'required|string|max:200',
                'address' => 'nullable|string|max:200',
                'phone' => 'nullable|numeric|digits_between:9,12',
                'current_password' => 'required',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            //Change Password
            $user = Auth::user();
            $user->name = $request->name;
            $user->address =  $request->address;
            $user->phone =  $request->phone;
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return redirect()->back()->with("success","Thông tin tài khoản đã được cập nhật thành công !");
        }else{
            $request->validate([
                'name' => 'required|string|max:200',
                'address' => 'nullable|string|max:200',
                'phone' => 'nullable|numeric|digits_between:9,12',
            ]);

            //Change Only Info
            $user = Auth::user();
            $user->name = $request->name;
            $user->address =  $request->address;
            $user->phone =  $request->phone;
            $user->save();
            return redirect()->back()->with("success","Thông tin tài khoản đã được cập nhật thành công !");
        }


    }
}
