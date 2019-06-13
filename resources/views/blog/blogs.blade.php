@extends('user.partials._app')
@section('body')
<div class="container">
   <div class="row">
     <div class="col-md-8">
       <h1>Blogs</h1>
     </div>
   </div>
   <div class="row">
     <div class="col-md-8">
      @foreach($posts as $post)
       <div class="post">
         <h3>{{$post->title}}</h3>
         <p>{{substr(strip_tags($post->body), 0, 30)}}{{ strlen(strip_tags($post->body))>30 ?"...":""}}</p>
         <a class="btn btn-primary btn-lg" href="{{ route('blog.single',$post->slug)}}" role="button">read more</a>
       </div>
       <hr>
       @endforeach
     </div>         
   </div>
   <div class="row">
     <div class="col-md-8">
       <div class="text-center">{{$posts->links()}}</div>
     </div>
   </div>
</div>
@endsection