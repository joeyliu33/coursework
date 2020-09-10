@extends('layouts/master')
  
@section('title')
  Recent Post
@endsection

@section('content') 
  <h1>Recent Post</h1><br>
  @if ($recentPosts)
    @foreach($recentPosts as $recentPost)
      <div class="row" id="postcontent">
        <div class="col-md-4"><img src="{{asset("$recentPost->icon")}}" width=110px; height=95px;><br>
          Author: <em>{{$recentPost->userName}}</em><br>
        </div>
        <div class="col-md-6">
        <h2>#{{$recentPost->title}}#</h2></a><br>
        {{$recentPost->msg}}<br><br>
        <em>{{$recentPost->d}}</em><br>
        </div>
        <div class="col-md-2"><br><br><br>
          @foreach($ncomments as $ncomment)
            @if ($ncomment->id == $recentPost->id)
              Comment({{$ncomment->ncomment}})
            @endif
          @endforeach
          <br><a href="{{url("update_post/$recentPost->id")}}">Edit</a>
          <a href="{{url("delete_post/$recentPost->id")}}">Delete</a><br><br>
        </div>
      </div><br>
    @endforeach
  @else
    Post not found.
  @endif
@endsection

