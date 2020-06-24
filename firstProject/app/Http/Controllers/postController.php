<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class postController extends Controller
{
    //any user can see that if he dosn't login
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    // index page
    public function index()
    {
        $posts = Post::orderBy('id','asc')->paginate(6);
        $count = (Post::count());
        return view('Posts.index',compact('posts','count')); 
    }
    // show page
    public function show($id)
    {
        $post = Post::find($id);
        return view('Posts.show',compact('post'));

    }

    // create post 
    public function create()
    {
        return view('posts.create');
    }

    // store method
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:200',
            'body'=>'required|max:250',
            'coverImage' => 'image|mimes:jpeg,bmp,png|max:1999'

        ]);

        if($request->hasFile('coverImage'))
        {
            $file = $request->file('coverImage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'cover_image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/coverImages', $filename);
        }else
        {
            $filename='noImage.png';
        }

        $post=new Post();
        $post->title= $request->title;
        $post->body= $request->body;
        $post->image=$filename;
        $post->user_id=auth()->user()->id;
        $post->save();

        return redirect('/Posts')->with('status','Post is created !');

    }
    
    // edit post 
    public function edit($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id != $post->user_id)
        {
            return redirect('/Posts')->with('error','You are not autherized boy!');
        }
        return view('Posts.edit',compact('post'));

    }

    // ubdate post 

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|max:200',
            'body'=>'required|max:250'

        ]);
        $post = Post::find($id);
        $post->title= $request->title;
        $post->body= $request->body;
        $post->save();
        return redirect('/Posts')->with('status','Post is updated !');
    }

    //destroy post
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/Posts')->with('status','Post is Deleted Successfully !');
    }

}
