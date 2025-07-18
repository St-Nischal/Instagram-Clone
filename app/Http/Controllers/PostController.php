<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //Ensures that the user is authenticated before accessing any methods in this controller
    public function __construct()
    {
        $this->middleware(middleware:'auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with(relations: 'user')->latest()->get();
        return view(view:'posts.index', data: compact(var_name:'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(view:'posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate(rules: [
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file(key:'image')->store(path:'uploads',options: 'public');
        // Create the post with the authenticated user's ID
        // and the image path
        // and the image URL
        auth()->user()->posts()->create(attributes:[
            'caption' => $data['caption'],
            'image_path' => $imagePath,
        ]);

        return redirect(to:'/profile' . auth()->user()->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view(view:'posts.show', data: compact(var_name: 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        if (auth()->id !== $post->user_id) {
            abort(code:403, message: 'Unauthorized action.');
        }
        return view(view:'posts.edit', data: compact(var_name: 'post'));
    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if (auth()->id !== $post->user_id) {
            abort(code:403, message: 'Unauthorized action.');
        }
        $data = $request->validate(rules: [
            'caption' => 'required',
        ]);
        $post -> update(attributes: $data);
        return redirect(to:'/posts/' . $post->id)->with(message: 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        if (auth()->id !== $post->user_id) {
            abort(code:403, message: 'Unauthorized action.');
        }
        Storage::disk(name: 'public')->delete(path: $post->image_path);
        //Delete the post
        $post -> delete();

        return redirect(to:'/profile/' . auth()->user()->id)->with(message: 'Post deleted successfully.');
    }
        //

}
