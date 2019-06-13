@extends('user.partials._app')

@section('head')
 <link rel="stylesheet" href="/css/select2.min.css">
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
 <script>
    tinymce.init({
        selector:'textarea',
        plugins: "link",
        menubar: "insert",
        toolbar: "link"
    });
 </script>
@endsection

@section('body')

<div class="container">
    <div class="row ">

         <div class="col-md-8 col-md-offset-2">
             <h1> Updating Post</h1>
             <hr>

             @include('includes.message')
           
             <form action="{{ route('posts.update', $post->id) }}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input class="form-control" type="text" name="title" id="name" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{$post->slug}}">
                </div>
                <div class="form-group">
                    <label for="category_id">Post Category</label>
                    <div>
                        <select class="form-control" name="category_id" id="category_id">
                            
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                
                                @if($post->category->id == $category->id)
                                 selected
                                @endif

                                >{{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="tags">Post Tags</label>
                    <div>
                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">

                        @foreach ($tags as $tag)
                          <option value="{{$tag->id}}"
                             @foreach ($post->tags as $postTag)

                             @if($postTag->id == $tag->id)

                               selected

                             @endif

                             @endforeach
                            >{{ $tag->name}}</option>
                        @endforeach
                        
                        
                      </select>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="body">Post Body</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post->body}}</textarea>
                </div>
                
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-danger">Cancel</a>
                <input type="submit" value="Save Changes" class="btn btn-primary">
              
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