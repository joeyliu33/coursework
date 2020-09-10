@extends('layouts.master')

@section('title')
  Update post
@endsection

@section('content')
  <h2>Update Post</h2>
  <form method="post" action="{{url("update_post_action")}}">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$post->id}}">
    <p>
      <label>Title</label><br>
      <input type="text" name="title" value="{{$post->title}}" id="inputbox">
    </p>
    <p>
      <label>Message:</label><br>
      <textarea name="msg" id="inputbox">{{$post->msg}}</textarea>
    </P>
    <p>
      <label>Date:</label><br>
      <input type="date" name="d" value="{{$post->d}}" id="inputbox">
    </P>
    <p>
      <label>Name:</label><br>
      <input type="text" name="userName" value="{{$post->userName}}" id="inputbox"> 
    </P>
    <input type="submit" value="Update">
    <button><a href="{{url("/")}}">Cancel</a></button>
  </form>
  @endsection
