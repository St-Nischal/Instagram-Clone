<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(middleware: 'auth');
    }

    public function store(Post $post)
    {
        // Check if the user has already liked the post
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with(message: 'You have already liked this post.');
        }

        // Create a new like
        $post->likes()->create(attributes: [
            'user_id' => auth()->id(),
        ]);

        return back()->with(message: 'Post liked successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post ->likes()->where(column:'user_id', operator:auth()->id())->delete();
        return back()->with(message: 'Post unliked successfully.');
    }
}
