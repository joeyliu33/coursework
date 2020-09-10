<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Cart;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::whereRaw('carts.user_id=?', Auth::user()->id)
            ->join('dishes', 'dishes.id', '=', 'carts.dish_id')
            ->join('users', 'users.id', '=', 'dishes.user_id')
            ->select('users.name as restaurant_name', 'dishes.name as dish_name', 'dishes.price as dish_price', 'dishes.image as dish_image')
            ->get();
        $sum = 0;
        foreach ($carts as $cart)
            $sum = $sum + $cart->dish_price;
        return view('cart.index')->with('carts', $carts)->with('sum', $sum);
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
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->dish_id = $request->dish_id;
        $cart->save();
        $carts = Cart::whereRaw('carts.user_id=?', Auth::user()->id)
            ->join('dishes', 'dishes.id', '=', 'carts.dish_id')
            ->join('users', 'users.id', '=', 'dishes.user_id')
            ->select('users.name as restaurant_name', 'dishes.name as dish_name', 'dishes.price as dish_price', 'dishes.image as dish_image')
            ->get();
        $sum = 0;
        foreach ($carts as $cart)
            $sum = $sum + $cart->dish_price;
        return view('cart.index')->with('carts', $carts)->with('sum',$sum);
        /*
        $orders = Dish::whereRaw('dishes.user_id=?', Auth::user()->id)
            ->join('orders', 'dishes.id', '=', 'orders.dish_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.name as customer_name', 'dishes.name as dish_name', 'orders.updated_at')
            ->get();
        */
        /*
        $dish = Dish::whereRaw('id= ?', $cart->dish_id)->get();
        $restaurant = User::whereRaw('id = ?', $dish[0]->user_id)->get();
        return view("order.purchase")->with('order',$order)->with('dish',$dish)->with('restaurant',$restaurant);
        */
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        $cart_id = $request->cart_id;
        DB::table('carts')->where('id', $cart_id)->delete();
        return redirect("cart");
        /*
        $cart = Cart::find($cart_id);
        $cart->delete();
        return redirect("cart");
        */
    }


    public function purchase()
    {
        
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect(URL()->previous());
    }
}
