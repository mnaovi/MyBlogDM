@extends('user.partials._app')

@section('body')

<div class="container">
	<div class="row ">
		 <div class="col-md-8 col-md-offset-2">
			 <h1>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} posts</small></h1>
			 <hr>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				    @foreach($tag->posts as $post)
					<tr>
						<th>{{$post->id}}</th>
						<td>{{$post->title}}</td>
						<td>
							@foreach($post->tags as $tag)
							  <span style="color: grey;">{{$tag->name}}</span>
							@endforeach
						</td>
						<td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-default btn-sm">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection