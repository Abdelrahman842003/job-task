<?php

namespace App\Http\Controllers\Dashboard\posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("dashboard.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view("dashboard.posts.create", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {

        $validated = $request->validated();
        Post::create($validated);
        toastr()->success(message: 'Post Created Successful');
        return redirect(route('dashboard.posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $user = $post->user;

        $users = User::get();
        return view("dashboard.posts.update", compact("post", "user", "users"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, string $id)
    {
        $validated = $request->validated();
        $post = Post::findOrFail($id);
        $post->update($validated);
        toastr()->success(message: 'Post Updated Successful');
        return redirect(route('dashboard.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        toastr()->error(message: 'Post Deleted Successful');
        return redirect(route('dashboard.posts.index'));
    }
}
