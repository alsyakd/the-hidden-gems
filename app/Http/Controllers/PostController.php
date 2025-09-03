<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    // Publik
    public function index() { //normalnya ini namanya index
        $posts = Post::with(['category','author.user'])
            ->where('published', true)
            ->latest('published_at')
            ->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        abort_if(!$post->published, 404);
        return view('posts.show', compact('post'));
    }

    // Author area
    public function create() {
        $categories = Category::orderBy('name')->get();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => ['required','max:255'],
            'category_id' => ['required','exists:categories,id'],
            'content' => ['required'],
            'featured_image' => ['nullable','image','max:2048'],
            'published' => ['nullable','boolean'],
        ]);

        $slug = Str::slug($data['title']);
        // unikkan slug
        $base = $slug; $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        $path = null;
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts','public');
        }

        $post = Post::create([
            'category_id' => $data['category_id'],
            'author_id' => auth()->user()->author->id,
            'title' => $data['title'],
            'slug' => $slug,
            'content' => $data['content'],
            'excerpt' => Str::limit(strip_tags($data['content']), 160),
            'featured_image' => $path,
            'published' => (bool) $request->boolean('published'),
            'published_at' => $request->boolean('published') ? now() : null,
        ]);

        return redirect()->route('dashboard')->with('success','Post dibuat.');
    }

    public function edit(Post $post) {
        $this->authorizeAuthor($post);
        $categories = Category::orderBy('name')->get();
        return view('posts.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post) {
        $this->authorizeAuthor($post);

        $data = $request->validate([
            'title' => ['required','max:255'],
            'category_id' => ['required','exists:categories,id'],
            'content' => ['required'],
            'featured_image' => ['nullable','image','max:2048'],
            'published' => ['nullable','boolean'],
        ]);

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) Storage::disk('public')->delete($post->featured_image);
            $post->featured_image = $request->file('featured_image')->store('posts','public');
        }

        $post->title = $data['title'];
        $post->category_id = $data['category_id'];
        $post->content = $data['content'];
        $post->excerpt = Str::limit(strip_tags($data['content']),160);
        $wasPublished = $post->published;

        $post->published = (bool) $request->boolean('published');
        if (!$wasPublished && $post->published) $post->published_at = now();
        if ($wasPublished && !$post->published) $post->published_at = null;

        $post->save();

        return redirect()->route('dashboard')->with('success','Post diperbarui.');
    }

    public function destroy(Post $post) {
        $this->authorizeAuthor($post);
        if ($post->featured_image) Storage::disk('public')->delete($post->featured_image);
        $post->delete();
        return back()->with('success','Post dihapus.');
    }

    protected function authorizeAuthor(Post $post) {
        $mine = auth()->user()->author->id ?? null;
        abort_if($post->author_id !== $mine && !auth()->user()->isAdmin(), 403);
    }
}
