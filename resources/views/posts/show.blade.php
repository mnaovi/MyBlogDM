@extends('user.partials._app')

@section('body')
    <div class="container">
    	<div class="row">
    		<div class="col-md-8">
    			<h1>{{ $post->title }}</h1>
                <p>{{ $post->body }}</p>
    		</div>
    		<div class="col-md-4">
    			<div class="card">
    				<dl class="row card-body">
    					<dt>Created at : </dt>
    					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
    				</dl>

    				<dl class="row card-body">
    					<dt>Updated at : </dt>
    					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
    				</dl>
    				<hr>
    				<div class="row">
    					<div class="col-sm-6">
    						<a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
    					</div>
    					<div class="col-sm-6">
    						<a href="{{ route('posts.destroy', $post->id)}}" class="btn btn-danger btn-block">Delete</a>
    					</div>

    				</div>

    			</div>
    		</div>
    	</div>
    </div>
    <hr> 
    
@endsection