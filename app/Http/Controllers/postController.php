<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use GrahamCampbell\Markdown\Facades\Markdown;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::all();
        foreach ($posts as $post) {
            $post->content = Markdown::convertToHtml($post->content);
        }
        return view("posts.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'tags' => 'nullable|string',
        ]);

        $post = new Post();
        $post->title = $request->title;
        // Store markdown content directly
        $post->content = $request->content;
        $post->category = $request->category;
        $post->tags = $request->tags;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


        /**
     * Fetch tags based on the selected category.
     */
    public function getTags($category)
    {
        $tags = Tag::where('category_id', $category)->pluck('name');
        return response()->json($tags);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->content = Markdown::parse($post->content);
        return view('posts.index', compact('post'));
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
        //
    }
}
