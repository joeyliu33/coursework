@extends('layouts/master')
  
  @section('title')
    Delete post
  @endsection

  @section('content') 
    <h2>delete this post?</h2>
    <form method="post" action="{{url("delete_post_action/$id")}}">
      {{csrf_field()}}
      <input type="submit" value="Delete">
    </form>
  @endsection

