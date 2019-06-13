@extends('user.partials._app')

@section('body')
 
  <div class="container">
  	<div class="row">
  		<div class="col-md-8">
  			<h1>Categories :</h1>
  			<table class="table">
  				<thead>
  					<tr>
  						<th>#</th>
  						<th>Name</th>
  					</tr>
  				</thead>
  				<tbody>
  					@foreach($categories as $category)
  					<tr>
  						<th>{{ $category->id}}</th>
  						<td>{{$category->name}}</td>
              <td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
              <form id="delete-form-{{$category->id}}" action="{{ route('categories.destroy', $category->id)}}" style="display: none" method="post">
                        
                            {{ csrf_field()}}
                            {{method_field('Delete')}}

              </form>
              <td><a href="#" onclick="if(confirm('Are You Sure To Delete?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$category->id}}').submit();}
                        else{

                           event.preventDefault();
                        }" class="btn btn-danger btn-block">Delete</a></td>
  					</tr>
  					@endforeach
  				</tbody>
  			</table>
  		</div>
  		<div class="col-md-4">
  				
  					<h1>New Category: </h1>
            <a href="{{ route('categories.create')}}" class="btn btn-primary">Add New Category</a>

            

            
  			
  		</div>

  		
  	</div>
  </div>
  
@endsection