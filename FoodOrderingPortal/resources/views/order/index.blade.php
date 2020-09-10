@extends('layouts.app')

  @section('content')
    @foreach ($orders as $order)
      <strong>Customer name: &nbsp</strong> {{$order->customer_name}}<br>
      <strong>Dish name: &nbsp</strong> {{$order->dish_name}}<br>
      <strong>Purchase date: &nbsp</strong> {{$order->updated_at}}<br><br>
    @endforeach
  @endsection