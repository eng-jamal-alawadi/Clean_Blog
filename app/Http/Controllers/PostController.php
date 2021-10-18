<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate(10);
        return view('clean_blog.admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('clean_blog.admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required ',
            'subtitle' => 'required |max:100',
            'content' => 'required |max:100',
            'category_id' => 'required |max:100',
        ]);

        //upload new image
        $ex = $request->file('image')->getClientOriginalExtension();
        $new_name = 'Post_'.time().'_'.$ex;
        $request->file('image')->move(public_path('upload'),$new_name);

        $posts=Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'subtitle'=> $request->subtitle,
                'content'=>$request->content,
                'image'=>$new_name,
                'user_id' => 1,
                'category_id'=>$request->category_id,
            ]);

            return redirect()->route('posts.index',compact('posts'))->with('success','Post added successfuly')->with('type','success');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::select(['id','name'])->get();

        return view('clean_blog.admin.posts.edit',compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::findOrFail($id);

        $new_name = $post->image;

         if($request->has('image')){
             //upload new image
         $ex = $request->file('image')->getClientOriginalExtension();
         $new_name = 'Post_'.time().'_'.$ex;
         $request->file('image')->move(public_path('upload'),$new_name);
         }

         Post::find($id)->update([
                 'title' => $request->title,
                 'subtitle'=> $request->subtitle,
                 'content'=>$request->content,
                 'image'=>$new_name,
                 'user_id' => auth()->user()->id,
                 'category_id'=>$request->category_id,
             ]);

             return redirect()->route('posts.index',compact('post'))->with('success','Post Updated successfuly')->with('type','warning');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('success','the post deleted successfuly')->with('type','success');
    }
}
