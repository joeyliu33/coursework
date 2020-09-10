@extends('layouts.app')

  @section('content')
    <p>Cannot edit dishes of other restaurants.</p>
    <p><a href='{{url("dish")}}'>Home</a></p>
  @endsection
