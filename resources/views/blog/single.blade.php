@extends('user.partials._app')

@section('body')
  <div class="container">
  	<div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<h1>{{ $post->title}}</h1>
    		<p>{!! $post->body !!}</p>
    		<hr>
    		<p1>Category Name: {{$post->category->name}}</p1>
    	</div>
    </div>
    <br>

    <div class="row">
      <div class="col-md-8 col-md-offset-2" >
        <h3 class="author-title"><span class="glyphicon glyphicon-envelope"></span>{{$post->comments->count()}} Comments</h3>
        @foreach($post->comments as  $comment)
        <div class="comment">
          <div class="author-info">
            <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))) . "?s=50&d=robohash"}}" class="author-image">
            <div class="author-name">
              <h4>{{$comment->name}}</h4>
              <p class="author-time">{{date('F nS, Y - g:i A',strtotime($comment->created_at))}}</p>
            </div>
          </div> 
          <div class="comment-content">
              {{$comment->comment}}
          </div>
        </div>
        @endforeach
      </div>
    </div>


    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form action="{{route('comments.store', $post->id)}}" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">Name : </label>
              <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Email : </label>
              <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="col-md-12 form-group">
              <label for="comment">Comment : </label>
              <textarea class="form-control" name="comment" id="comment" rows="5"></textarea>
              <input type="submit" value="Add Comment" class="btn btn-success btn-block" style="margin-top: 15px;">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection