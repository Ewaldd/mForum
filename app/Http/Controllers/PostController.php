<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    public function store(Request $request) {
        $request->validate([
            'post' => 'required|min:5',
        ]);
        $post = Post::where(['id' => $request->id]);
        if ($post->count() == 0) {
            return redirect("/");
        }
        Post::create([
            'title' => $post->first()->title,
            'slug' => $post->first()->slug,
            'post_parent_id' => $post->first()->id,
            'category_id' => $post->first()->category_id,
            'content' => $request->post,
            'author_id' => auth()->user()->id,
        ]);
        return redirect(route('post_show', ['id' => $post->first()->id, 'slug' => $post->first()->slug]));
    }

    public function show($id) {
        $post = Post::where(['id' => $id])->with(['replies', 'user'])->first();
        if(!is_null($post->post_parent_id)){
            $post = Post::where(['id' => $post->post_parent_id])->with(['replies', 'user'])->first();
            return redirect(route("post_show", ['id'=> $post->id, 'slug' => $post->slug]));
        }
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        //
    }
}
