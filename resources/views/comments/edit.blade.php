@extends('user.partials._app')

@section('body')
<div class="container">
	<div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form action="{{route('comments.update', $comment->id)}}" method="post">
          {{csrf_field()}}
          {{method_field('put')}}
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">Name : </label>
              <input class="form-control" type="text" name="name" disabled="" id="name" value="{{$comment->name}}">
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Email : </label>
              <input class="form-control" type="text" name="email" id="email" disabled="" value="{{$comment->email}}">
            </div>
            <div class="col-md-12 form-group">
              <label for="comment">Comment : </label>
              <textarea class="form-control" name="comment" id="comment" rows="5">{{$comment->comment}}</textarea>
              <input type="submit" value="Update Comment" class="btn btn-success btn-block" style="margin-top: 15px;">

            </div>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection