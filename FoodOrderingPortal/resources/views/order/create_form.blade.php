@extends('layouts.app')

  @section('content')
      <form method="POST" action='{{url("order")}}'>
        {{csrf_field()}}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <p><label>Name: &nbsp</label><input type="text" name="name" value="{{old('name')}}">
        @if (count($errors->get('name'))> 0)
          <label class="alert1">
            {{$errors->first('name')}}
          </label>
        @endif
        </p>
        <p><label>Price: &nbsp&nbsp</label><input type="text" name="price" value="{{old('price')}}">
        @if (count($errors->get('price'))> 0)
          <label class="alert1">
            {{$errors->first('price')}}
          </label>
        @endif
        </p>
        <p><label>Image:</label>
          <input type="file" name="image"></p>
          @if (count($errors->get('image'))> 0)
          <label class="alert1">
            {{$errors->first('image')}}
          </label>
        @endif
        </p>
        <input type="submit" value="Create">
      </form>
  @endsection
