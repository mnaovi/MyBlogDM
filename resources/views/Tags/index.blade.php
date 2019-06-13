@extends('user.partials._app')

@section('body')
 
  <div class="container">
  	<div class="row">
  		<div class="col-md-8">
  			<h1>Tags :</h1>
  			<table class="table">
  				<thead>
  					<tr>
  						<th>#</th>
  						<th>Name</th>
  					</tr>
  				</thead>
  				<tbody>
  					@foreach($tags as $tag)
  					<tr>
  						<th>{{ $tag->id}}</th>
  						<td>{{$tag->name}}</td>
              <td><a href="{{route('tags.show',$tag->id)}}" class="btn btn-success">View</a></td>
              <td><a href="{{ route('tags.edit',$tag->id)}}" class="btn btn-primary">Edit</a></td>
              <form id="delete-form-{{$tag->id}}" action="{{ route('tags.destroy', $tag->id)}}" style="display: none" method="post">
                        
                            {{ csrf_field()}}
                            {{method_field('Delete')}}

              </form>
              <td><a href="#" onclick="if(confirm('Are You Sure To Delete?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$tag->id}}').submit();}
                        else{

                           event.preventDefault();
                        }" class="btn btn-danger btn-block">Delete</a></td>
  					</tr>
  					@endforeach
  				</tbody>
  			</table>
  		</div>
  		<div class="col-md-4">
  				
  					<h1>New Tag: </h1>
            <a href="{{ route('tags.create')}}" class="btn btn-primary">Add New Tag</a>

            

            
  			
  		</div>

  		
  	</div>
  </div>
  
@endsection