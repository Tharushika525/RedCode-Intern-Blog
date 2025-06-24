<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
    return Inertia::render('Posts/Index', ['posts' => $posts]);
    }


    public function create()
    {
          return Inertia::render('Posts/Create');
    }


    public function store(Request $request)
    {
         $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|max:2048',

    ]);

     if ($request->hasFile('image')) {
        $path = $request->file('image')->store('uploads', 'public');
        $validated['image'] = $path;
    }

    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Post created!');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
         return Inertia::render('Posts/Edit', ['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
       $validated = $request->validate([
        'title' => 'required',
        'body' => 'required',
    ]);

    $post->update($validated);

    return redirect()->route('posts.index')->with('success', 'Post updated!');
    }


    public function destroy(Post $post)
    {
        $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
}
