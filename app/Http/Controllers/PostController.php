<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post){
        return view('blog-post',['post'=>$post]);
    }


    public function create(){
        $this->authorize('create',Post::class);

        return view('admin.post.create');
    }


    public function store(){
        //$this->authorize('create',Post::class);
        $inputs = \request()->validate([
            'title'=>'required| min:8 | max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        if (\request('post_image')){
            $inputs['post_image']=\request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);
        Session::flash('post-created-message',$inputs['title'].' was created successfully');

        return redirect()->route('post.index');
    }


    public function index(){
        $posts = auth()->user()->posts()->paginate(2);
        return view('admin.post.index',['posts'=>$posts]);
    }


    public function destroy(Post $post){
        $this->authorize('delete',$post);

        $post->delete();
        Session::flash('message','Post was Deleted');
        return back();
    }


    public function edit(Post $post){
        $this->authorize('view',$post);

        return view('admin.post.edit',['post'=>$post]);
    }


    public function update(Post $post){
        $this->authorize('update',$post);

        $inputs = \request()->validate([
            'title'=>'required| min:8 | max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        if (\request('post_image')){
            $inputs['post_image']=\request('post_image')->store('images');
        }
        $post->update($inputs);
        Session::flash('post-edited-message',$inputs['title'].' was edited successfully');

        return redirect()->route('post.index');
    }
}
