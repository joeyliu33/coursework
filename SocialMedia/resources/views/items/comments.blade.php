@extends('layouts/master')
  
  @section('title')
    Comment
  @endsection

  @section('content') 
    <div class="row" id="cotent">
      <div class="col-md-3">
        <h2>Add comment:</h2>
        <form method="post" action="{{url("add_comment_action")}}">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$Pcomments[0]->id}}">
          <p>
            <label>Name</label><br>
            <input type="text" name="cname" id="inputbox">
          </p>
          <p>
            <label>Message</label><br>
            <textarea name="cmsg" id="inputbox" style="height:110px;"></textarea>
          </P>
          </P>
          <input type="submit" value="Add">
        </form>
      </div>
      <div class="col-md-9" id="postcotent">
          <div class="row" id="postcontent">
            <div class="col-md-4"><img src="{{url($Pcomments[0]->icon)}}" width=110px; height=95px;><br>
              Author: <em>{{$Pcomments[0]->userName}}</em><br><br>
            </div>
            <div class="col-md-6">
              <h2>#{{$Pcomments[0]->title}}#</h2><br>
              {{$Pcomments[0]->msg}}<br>
              <br><em>{{$Pcomments[0]->d}}</em><br>
            </div>
            <div class="col-md-2"><br><br><br>
              @foreach($ncomments as $ncomment)
              @if ($ncomment->id == $Pcomments[0]->id)
                Comment({{$ncomment->ncomment}})
              @endif
              @endforeach
              <br><a href="{{url("update_post/$post->id")}}">Edit</a>
              <a href="{{url("delete_post/$post->id")}}">Delete</a><br><br>
            </div>
          </div>
          <br>
        <h2>Comments:</h2>
        @if(count($Pcomments[1])>0)
          @foreach($Pcomments[1] as $Pcomment)
          <em>{{$Pcomment->cname}}</em> said: {{$Pcomment->cmsg}}<br>
            <a href="{{url("delete_comment/$Pcomment->id")}}">Delete</a><br><br>
          @endforeach
        @else
          No comment.<br><br>
        @endif
      </div>
    </div>
  @endsection

