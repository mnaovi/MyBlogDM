@extends('user.partials._app')

@section('head')
 <link rel="stylesheet" href="/css/select2.min.css">
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
 <script>
 	tinymce.init({
 		selector:'textarea'});
 </script>
@endsection

@section('body')

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
				 	<label for="slug">Post Slug</label>
				 	<input class="form-control" type="text" name="slug" id="slug">
			 	</div>
			 	<div class="form-group">
				 	<label for="category_id">Post Category</label>
				 	<div>
				 		<select class="form-control" name="category_id" id="category_id">
				 			@foreach($categories as $category)
					 		<option value="{{$category->id}}">{{$category->name}}</option>
					 		@endforeach
				 	    </select>
				 	</div>
				 	
			 	</div>

			 	<div class="form-group">
				 	<label for="tags">Post Tags</label>
				 	<div>
				 		<select class="form-control select2" name="tags[]" id="tags" multiple="multiple">
				 			@foreach($tags as $tag)
					 		<option value="{{$tag->id}}">{{$tag->name}}</option>
					 		@endforeach
				 	    </select>
				 	</div>
				 	
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

@section('javascript')
 
 <script src="{{ asset('/js/select2.min.js')}}"></script>
 
 <script>
     
     $(document).ready(function(){

      $('.select2').select2();
     });
  </script>
 
@endsection