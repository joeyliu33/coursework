@extends('layouts.app')

  @section('content')
    <h1>Thanks for your order, {{Auth::user()->name}}.</h1>
    
    <p><label><strong>Restaurant:&nbsp&nbsp</strong></label>{{$restaurant[0]->name}}</p>
    <p><label><strong>Dish:&nbsp&nbsp</strong></label>{{$dish[0]->name}}</p>
    <p><label><strong>Price:&nbsp&nbsp</strong></label>{{$dish[0]->price}}</p>
    <p><label><strong>Address:&nbsp&nbsp</strong></label>{{Auth::user()->address}}</p>
    <p><a href='{{url("dish")}}'>Home</a></p>
  @endsection
