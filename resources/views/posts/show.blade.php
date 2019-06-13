@extends('user.partials._app')

@section('body')
    <div class="container">
    	<div class="row">
    		<div class="col-md-8">
                <img src="{{ asset('images/' . $post->image) }}" alt="Image is here" width="800" height="400">
    			<h1>{{ $post->title }}</h1>
                <p>{!! $post->body !!}</p>
                <hr>
                <div>
                    @foreach($post->tags as $tag)
                       <span style="color:grey;">{{ $tag->name}}</span>
                    @endforeach
                </div>
                <br>
                <div>
                    <h3>Comments <small>{{$post->comments->count()}} total</small></h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->comments as $comment)
                        <tr>
                            <td>{{$comment->name}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->comment}}</td>
                            <th><a href="{{ route('comments.edit',$comment->id)}}" class="btn btn-primary">Edit</a></th>
                            <form id="delete-form-{{$comment->id}}" action="{{ route('comments.destroy', $comment->id)}}" style="display: none"method="post">
                        
                              {{ csrf_field()}}
                              {{method_field('Delete')}}

                            </form>
                            <th><a href="#" onclick="if(confirm('Are You Sure To Delete?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{$comment->id}}').submit();}
                                else{

                                   event.preventDefault();
                                }" class="btn btn-danger btn-block">Delete</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    		</div>
    		<div class="col-md-4">
    			<div class="card">
    				<dl class="row card-body">
    					<dt>Url : </dt>
    					<dd><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></dd>
    				</dl>

                    <dl class="row card-body">
                        <dt>Category : </dt>
                        <dd>{{$post->category->name}}</dd>
                    </dl>

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
                        <form id="delete-form-{{$post->id}}" action="{{ route('posts.destroy', $post->id)}}" style="display: none" method="post">
                        
                            {{ csrf_field()}}
                            {{method_field('Delete')}}

                        </form>
                        <div class="col-sm-6">

                        <a href="#" onclick="if(confirm('Are You Sure To Delete?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$post->id}}').submit();}
                        else{

                           event.preventDefault();
                        }" class="btn btn-danger btn-block">Delete</a>
                        </div>
                        <div class="col-sm-12">
                            <a href="{{ route('posts.index')}}" class="btn btn-success btn-block btn-h1-spacing">Show All Posts</a>
                        </div>
    					

    				</div>

    			</div>
    		</div>
    	</div>
    </div>
    <hr> 
    
@endsection