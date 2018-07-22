<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Notifications\NuevoPost;
use App\Repositories\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Post $posts)
    {
        //$posts = $posts->all();

        $posts = Post::latest()
        ->filter(request()->only(['month', 'year']))
        ->get();

    	return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    { 
    	return view('posts.show',compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(Request $request)
    {
		// FORM VALIDATION 101
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required',
            'imagen' => 'required|image'
    	]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
            'avatar_path' => request()->file('imagen')->store('postsimages', 'public')
        ]);

        $usuarios = User::all();

        foreach($usuarios as $user){
            $user->notify(new NuevoPost($post));
        }

    	session()->flash('message', 'Post creado correctamente');

    	return redirect('/posts' . '/' . $post->id);
 
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    /**
     * Update an existing post.
     *
     * @param Post $post
     */
    public function update(Request $request, Post $post)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'imagen' => 'sometimes|image'
        ]);

        if (request()->file('imagen')) {
            $post->update([
                'title' => request('title'),
                'body' => request('body'),
                'avatar_path' => request()->file('imagen')->store('postsimages', 'public')
            ]);
        }else{
            $post->update([
                'title' => request('title'),
                'body' => request('body'),
            ]);
        }

        session()->flash('message', 'Post actualizado correctamente');

        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post){
        $post->delete();

        session()->flash('message', 'Post eliminado correctamente');

        return redirect('/posts');
    }
}