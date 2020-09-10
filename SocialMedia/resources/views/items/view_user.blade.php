@extends('layouts/master')
  
@section('title')
  User
@endsection

@section('content') 
  <h1>User</h1>
    @if ($users)
      @foreach($users as $user)
        <a href="{{url("view_userPost/$user->userName")}}" id="urlbutton" style="color:rgb(221, 101, 121);font-size:larger;">{{$user->userName}}</a><br>
      @endforeach
    @else
      No user found
    @endif
@endsection

