<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function home()
    {
        $posts = Post::with('category')
                    ->published()
                    ->latest()
                    ->paginate(10);
        return view('home', compact('posts'));
    }

    public function index()
    {
        $posts = Post::with('category')
                    ->published()
                    ->latest()
                    ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = $request->published ? now() : null;
        $validated['author_name'] = session('user_name', 'Anonymous');
        $validated['author_role'] = session('user_role', 'guest');

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        if (!$post->published && session('user_role') !== 'admin') {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Admin dapat mengedit semua post, author hanya post mereka sendiri
        if (session('user_role') === 'author' && $post->author_name !== session('user_name')) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        // Admin dapat mengedit semua post, author hanya post mereka sendiri
        if (session('user_role') === 'author' && $post->author_name !== session('user_name')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = $request->published ? now() : null;

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Admin dapat menghapus semua post, author hanya post mereka sendiri
        if (session('user_role') === 'author' && $post->author_name !== session('user_name')) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
