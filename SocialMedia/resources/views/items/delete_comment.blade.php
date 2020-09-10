@extends('layouts/master')
  
  @section('title')
    Delete comment
  @endsection

  @section('content') 
    <h2>delete this comment?</h2>
    <form method="post" action="{{url("delete_comment_action/$id")}}">
      {{csrf_field()}}
      <input type="submit" value="Delete">
    </form>
  @endsection

