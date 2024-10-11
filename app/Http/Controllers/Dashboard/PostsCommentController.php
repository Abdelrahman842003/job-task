<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostsCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $post)
    {
        $comments = Comment::where('user_id', $post->user()->id)->get();

        return view('dashboard.posts.comments', compact('comments', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post->comments()->create([
            'user_id' => $post->user_id,
            'post_id' => $post->id,
            'content' => $request->content,
        ]);

        toastr()->success(message: 'Comment Created Successful');
        return redirect()->route('dashboard.posts.comments.index', $post);
    }
    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $comment->update(['content' => $request->content]);
        toastr()->success(message: 'Comment Updated Successful');
        return redirect()->route('dashboard.posts.comments.index', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        toastr()->error(message: 'Comment Deleted Successful');
        return redirect()->route('dashboard.posts.comments.index', $post);
    }
}
