<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(4);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            
           'title'       => 'required',
           'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
           'category_id' => 'required|integer',
           'body'        => 'required'   

        ]);

        $post = new Post;

        $post->title       = $request->title;
        $post->slug        = $request->slug;
        $post->category_id = $request->category_id;
        $post->body        = Purifier::clean($request->body);

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Blog post is created successfully!');

        return redirect(route('posts.show', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();
        return view('posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->slug == $post->slug)
        {
           $this->validate($request, [
            
           'title'       => 'required',
           'category_id' => 'required|integer',
           'body'        => 'required'   

            ]);

        }
        else{
            $this->validate($request, [
            
           'title'       => 'required',
           'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
           'category_id' => 'required|integer',
           'body'        => 'required'   

            ]);

        }

        $post->title       = $request->title;
        $post->slug        = $request->slug;
        $post->category_id = $request->category_id;
        $post->body        = Purifier::clean($request->body);

        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success', 'This post is updated successfully!');

        return redirect(route('posts.show', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'This Post was deleted successfully!');

        return redirect(route('posts.index'));
    }
}
