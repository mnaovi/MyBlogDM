@extends('user.partials._app')

@section('body')\

<div class="container">
	<div class="row ">

		 <div class="col-md-8 col-md-offset-2">
			 <h1> Creating New Post</h1>
			 <hr>

			 @include('includes.message')
	       
			 <form action="{{ route('posts.store') }}" method="post">
			 	{{csrf_field()}}
			 	<div class="form-group">
				 	<label for="title">Post Title</label>
				 	<input class="form-control" type="text" name="title" id="name">
			 	</div>
			 	<div class="form-group">
				 	<label for="body">Post Body</label>
				 	<textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
			 	</div>
			 	
				 
				<input type="submit" value="Create Post" class="btn btn-primary">
				 
			 	
	           
			 </form>
		 </div>
	</div>
</div>

@endsection