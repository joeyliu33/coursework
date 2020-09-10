<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('auth',['except'=>'index']);
        //$this->middleware('auth',['only'=>['create','edit']]);
        //$this->middleware('auth',['only'=>'edit']);
    }    

    public function index()
    {
        /*
        $restaurant_id = Auth::user()->id;
        $dishes = Dish::whereRaw('user_id= ?', $restaurant_id)->get();
        $orders = array();
        $customers = array();
        foreach ($dishes as $dish)
            $orders = array_merge($orders, Order::whereRaw('dish_id=?', $dish->id)->get());
        dd($orders);
        foreach ($orders as $order)
            $customers[] = User::whereRaw('id = ?', $order->user_id)->get();
        return view('order.index')->with('dishes', $dishes)->with('orders', $orders)->with('customers', $customers);
        */
        
        $orders = Dish::whereRaw('dishes.user_id=?', Auth::user()->id)
            ->join('orders', 'dishes.id', '=', 'orders.dish_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.name as customer_name', 'dishes.name as dish_name', 'orders.updated_at')
            ->get();
        return view('order.index')->with('orders', $orders);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('order.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->dish_id = $request->dish_id;
        $order->save();
        $dish = Dish::whereRaw('id= ?', $order->dish_id)->get();
        $restaurant = User::whereRaw('id = ?', $dish[0]->user_id)->get();
        return view("order.purchase")->with('order',$order)->with('dish',$dish)->with('restaurant',$restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $userid = Auth::user()->id;
        //$user = User::find(1);
        //$prod = $user->products;
        $products = User::whereHas('products', function($query)use($userid){
            return $query->whereRaw('user_id = ?', array($userid));
        })->get();
        dd($products);
        //$orders = Order::whereRaw('user_id = ?',array($userid))->get();
        return view('products.cart')->with('orders',$orders);
        */
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
    public function destroy($id)
    {
        //
    }
}
