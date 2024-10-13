<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('frontend.pages.blog', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);
        $validate['user_id'] = auth()->user()->id;

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('public/posts');

            $validate['image'] = str_replace('public/posts/', '', $validate['image']);
        }
        Post::create($validate);
        toastr()->success('Post created successfully');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::findorfail($id);
        if (Storage::exists('public/posts/' . $post->image)) {
            Storage::delete('public/posts/' . $post->image);
        }
        $post->delete();
        toastr()->success('Post deleted successfully');
        return redirect()->back();
    }
}
