<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        $posts = $user->isAdmin()
            ? Post::with('category','author.user')->latest()->paginate(10)
            : Post::with('category')
                ->where('author_id', $user->author->id ?? 0)
                ->latest()->paginate(10);

        return view('dashboard.index', compact('posts','user'));
    }
}
