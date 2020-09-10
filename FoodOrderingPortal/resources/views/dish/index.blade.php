@extends('layouts.app')

  @section('content')
    <h1>Restaurants</h1>
    <ul>
      @foreach ($users as $user)
        @if ($user->role=='restaurant')
          <a href="dish/{{$user->id}}"><li>{{$user->name}}</li>
        @endif
      @endforeach
    </ul>

  @endsection
