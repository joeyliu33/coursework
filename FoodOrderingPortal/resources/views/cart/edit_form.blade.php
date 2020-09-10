@extends('layouts.app')

  @section('content')
      <form method="POST" action='{{url("dish/$dish->id")}}' enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        @if (count($errors->get('name'))> 0)
        <p><label>Name</label>
        <input type="text" name="name" value="{{old('name')}}">
          <label class="alert1">
            {{$errors->first('name')}}
          </label>
        </p>
        @else
          <p><label>Name:</label>
           <input type="text" name="name" value="{{$dish->name}}"></p>
        @endif
        @if (count($errors->get('price'))> 0)
          <p><label>Price:</label>
          <input type="text" name="price" value="{{old('price')}}">
          <label class="alert1">
            {{$errors->first('price')}}
          </label>
          </p>
        @else
          <p><label>Price:</label>
          <input type="text" name="price", value="{{$dish->price}}"><br></p>
        @endif
        <p><label>Image:</label><br>
        @if ($dish->image)
          <img src='{{asset("dishes_images/$dish->image")}}' alt="{{$dish->name}}" style="width:200px;height:170px;">
        @endif
        <br><br><input type="file" name="image"></p>
        </p>
        <input type="submit" value="Update">
      </form>
  @endsection
