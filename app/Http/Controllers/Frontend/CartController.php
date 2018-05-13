<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        $data['mightAlsoLike'] = Product::mightAlsoLike()->get();

        return view('frontend/cart', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }

        Cart::add($request->id, $request->name, $request->quantity, $request->final_price)
            ->associate('App\Model\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
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

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCartItem($id)
    {
        Cart::remove($id);

        return response()->json([
            'message' => 'Giỏ hàng đã được cập nhật'
        ]);
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Model\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }

    public function addCartShopPage(Request $request)
    {
        if ($request->isMethod('post')){

            $product = Product::where('id',$request->id)->first();

            $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
                return $cartItem->id === $request->id;
            });

            if ($duplicates->isNotEmpty()) {
                $quantity = $request->quantity ?? 1;
                $rowId = $duplicates->first()->rowId;
                $qty_incart = $duplicates->first()->qty;
                Cart::update( $rowId, $qty_incart + $quantity);
                $message = 'Bạn đã thêm '.$product->name.' (sl: '.$quantity.') vào giỏ hàng';
            }else{
                Cart::add($request->id, $request->name, 1, $request->final_price)
                    ->associate('App\Model\Product');

                $message = 'Bạn đã thêm '.$product->name.' (sl: 1) vào giỏ hàng';
            }

            return response()->json([
                    'message' => $message,
                    'count' => Cart::count(),
                    'subtotal' => presentPrice(Cart::subtotal()),
                    'image' => url(getFeaturedImageProduct($product->image)),
                ],200);
        }else{
            return response()->json(['message' => 'Không thể thêm sản phẩm vào giỏ hàng'], 400);
        }
    }
}
