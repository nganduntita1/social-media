<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts with user relationship loaded
        $posts = Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'content' => 'required',
    //     ]);

    //     $post = Post::create([
    //         'content' => $validatedData['content'],
    //         'user_id' => auth()->user()->id,
    //     ]);

    //     return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    // }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = new Post();
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);

            $post->image = $imageName;
        }

        Auth::user()->posts()->save($post);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
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
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);

            // Delete the previous image if exists
            if ($post->image) {
                $previousImagePath = public_path('images/posts/' . $post->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}