@extends('user.partials._app')

@section('body')
  <div class="container">
  	<div class="row">
  		<div class="col-md-10">
  			<h1>All posts</h1>
  		</div>

  		<div class="col-md-2">
  			<a href="{{ route('posts.create')}}" class="btn btn-primary btn-block btn-h1-spacing">Create New Post</a>
  		</div>
  		<div class="col-md-12">
  			<hr>
  		</div>
  	</div>
  	<div class="row">
	  	<div class="col-md-12">
	  		<table class="table">
	  			<thead>
	  				<th>Id</th>
	  				<th>Title</th>
	  				<th>Body</th>
	  				<th>Created At</th>
	  				<th></th>
	  			</thead>
	  			<tbody>
	  				@foreach($posts as $post)

	  				  <tr>
	  				  	<th>{{ $post->id}}</th>
	  				  	<td>{{ $post->title}}</td>
	  				  	<td>{{ substr(strip_tags($post->body), 0, 20)}} {{ strlen(strip_tags($post->body)) > 20 ? "..." : "" }}</td>
	  				  	<td>{{ date('M j, Y h:i a', strtotime($post->created_at))}}</td>
	  				  	<td><a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary">View</a><a href="{{ route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a></td>
	  				  </tr>

	  				@endforeach
	  			</tbody>
	  		</table>
	  		<div class="text-center">
	  			{{$posts->links()}}
	  		</div>
	  	</div>
  	</div>

  		
  	
  </div>
@endsection