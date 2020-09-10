@extends('layouts.master')

@section('title')
  Post
@endsection

@section('content') 
  <div class="row" id="cotent">
    <div class="col-md-3">
      <h2>Add post</h2>
      <form method="post" action="{{url("add_post_action")}}">
        {{csrf_field()}}
        <p>
          <label>Title</label><br>
          <input type="text" name="title" id="inputbox">
        </p>
        <p>
          <label>Message</label><br>
          <textarea name="msg" id="inputbox" style="height:110px;"></textarea>
        </P>
        <p>
          <label>Date</label><br>
          <input type="date" name="d" id="inputbox">
        </P>
        <p>
          <label>Name</label><br>
          <input type="text" name="userName" id="inputbox"> 
        </P>
        <input type="submit" value="Add">
      </form>
    </div>
    <div class="col-md-9" id="postcotent">
      <h1>Post</h1><br>
        @if ($posts)
          @foreach($posts as $post)
            <div class="row" id="postcontent">
              <div class="col-md-3"><img src="{{asset("$post->icon")}}" width=110px; height=95px;><br>
                Author: <em>{{$post->userName}}</em><br>
              </div>
              <div class="col-md-7">
                <a href="{{url("comments/$post->id")}}"><h3>#{{$post->title}}#</h3></a><br>
                {{$post->msg}}<br><br>
                <em>{{$post->d}}</em><br>
              </div>
              <div class="col-md-2"><br><br>
                @foreach($ncomments as $ncomment)
                  @if ($ncomment->id == $post->id)
                    Comment({{$ncomment->ncomment}})
                  @endif
                @endforeach
                <br><a href="{{url("update_post/$post->id")}}">Edit</a>
                <a href="{{url("delete_post/$post->id")}}">Delete</a><br><br>
              </div>
            </div>
            <br>
          @endforeach
        @else
          Post not found.
        @endif
    </div>
  </div>
@endsection