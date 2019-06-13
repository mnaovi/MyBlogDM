@extends('user.partials._app')

@section('body')

<div class="container">
	<div class="row ">

		 <div class="col-md-8 col-md-offset-2">
			 <h1> Creating New Tag</h1>
			 <hr>

			 @include('includes.message')
	       
			 <form action="{{ route('tags.update' , $tag->id) }}" method="post">
			 	{{csrf_field()}}
			 	{{method_field('PUT')}}
			 	<div class="form-group">
				 	<label for="name">Tag Name</label>
				 	<input class="form-control" type="text" name="name" id="name" value="{{$tag->name}}">
			 	</div>
			 		 
				<input type="submit" value="Create" class="btn btn-primary"> 	
	           
			 </form>
		 </div>
	</div>
</div>

@endsection