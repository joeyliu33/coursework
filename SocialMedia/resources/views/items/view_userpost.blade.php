@extends('layouts/master')
  
@section('title')
  {{$userPosts[0]->userName}}'s Post
@endsection

@section('content') 
  <h2>{{$userPosts[0]->userName}}'s Post</h2><br>
  @if ($userPosts)
    @foreach($userPosts as $userPost)
      <div class="row" id="postcontent">
        <div class="col-md-4"><img src="{{asset("$userPost->icon")}}" width=110px; height=95px;><br>
          Author: <em>{{$userPost->userName}}</em><br>
        </div>
        <div class="col-md-6">
        <h2>#{{$userPost->title}}#</h2></a><br>
        {{$userPost->msg}}<br><br>
        <em>{{$userPost->d}}</em><br>
        </div>
        <div class="col-md-2"><br><br><br>
          @foreach($ncomments as $ncomment)
            @if ($ncomment->id == $userPost->id)
              Comment({{$ncomment->ncomment}})
            @endif
          @endforeach
          <br><a href="{{url("update_post/$userPost->id")}}">Edit</a>
          <a href="{{url("delete_post/$userPost->id")}}">Delete</a><br><br>
        </div>
      </div><br>
    @endforeach
  @else
    Post not found.
  @endif
@endsection

