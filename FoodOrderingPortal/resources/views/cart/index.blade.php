@extends('layouts.app')

  @section('content')
    <h1>Shopping Cart</h1>
    <h3>Total amount: ${{$sum}}</h3><br>
    @if (count($carts)>0)
      @foreach ($carts as $cart)
        <div classs="container">
          <div class="row">
            <div class="col-md-4">
            <img src='{{asset("dishes_images/$cart->dish_image")}}' alt="{{$cart->dish_name}}" style="width:200px;height:170px;"><br><br>
            </div>
            <div class="col-md-4">
              <strong>Restaurant name: &nbsp</strong> {{$cart->restaurant_name}}<br>
              <strong>Dish name: &nbsp</strong> {{$cart->dish_name}}<br>
              <strong>Dish price: &nbsp</strong> {{$cart->dish_price}}<br>
            </div>
            <div class="col-md-4">
            <form method="POST" action='{{url("cart/$cart->id")}}'>
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <input type="submit" value="Delete">
                </form>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <p>No dish added.</p>
    @endif
    <form method="POST" action='{{url("cart/purchase")}}'>
      {{csrf_field()}}
      <input type="submit" value="purchase">
    </form>
  @endsection