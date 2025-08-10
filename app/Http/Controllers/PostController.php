<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store image on the S3 'post_images' disk in 'post_images' folder (root is set to 'post_images' so it goes inside that folder)
        $imagePath = $request->file('image')->store('', 'post_images');

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image_path' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        $data = $request->validate([
            'caption' => 'required',
        ]);

        $post->update($data);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        // Delete the image from the 'post_images' disk
        Storage::disk('post_images')->delete($post->image_path);
        
        $post->delete();

        return redirect('/profile/' . auth()->user()->id);
    }
}