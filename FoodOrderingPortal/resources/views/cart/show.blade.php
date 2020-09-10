@extends('layouts.app')

  @section('content')
    <h1>{{$user[0]->name}}</h1>
    @foreach ($dishes as $dish)
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>{{$dish->name}}</h2>
            <p>price:{{$dish->price}}</P>
          </div>
          <div class="col-md-6">
            <img src='{{asset("dishes_images/$dish->image")}}' alt="{{$dish->name}}" style="width:200px;height:170px;"><br><br>
          </div>
          <div class="col-md-2">
            @if (!Auth::guest())
              @if (Auth::user()->role == "customer")
                <form method="POST" action='{{url("order")}}'>
                  {{csrf_field()}}
                  <input type="hidden" name="dish_id" value="{{$dish->id}}">
                  <input type="hidden" name="status" value='purchase'>
                  <input type="submit" value="purchase" />
                </form><br>
                <form method="POST" action='{{url("order")}}'>
                  {{csrf_field()}}
                  <input type="hidden" name="dish_id" value="$dish->id">
                  <input type="hidden" name="status" value='cart'>
                  <input type="submit" value="Add to cart" />
                </form><br>
              @elseif (Auth::user()->id == $dish->user_id)
                <form action='{{url("dish/$dish->id/edit")}}'>
                  <input type="submit" value="edit" />
                </form><br>
                <form method="POST" action='{{url("dish/$dish->id")}}'>
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <input type="submit" value="Delete">
                </form>
              @endif 
            @endif
          </div>
        </div>
      </div>
    @endforeach
    <br><br>
    {{ $dishes->links()}}
      @if (!Auth::guest())
        @if (Auth::user()->id == $user[0]->id)
          <p><a href='{{url("dish/create")}}'>create</a></p>
        @endif 
      @endif
  @endsection
