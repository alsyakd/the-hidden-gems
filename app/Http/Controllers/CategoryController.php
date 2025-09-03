<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function list() {
        $categories = Category::withCount(['posts' => fn($q)=>$q->where('published',true)])
            ->orderBy('name')->get();
        return view('categories.list', compact('categories'));
    }

    // contoh minimal untuk admin add kategori
    public function create() { return view('categories.create'); }

    public function store(Request $request) {
        $data = $request->validate(['name'=>['required','max:255']]);
        $slug = Str::slug($data['name']);
        if (Category::where('slug',$slug)->exists()) $slug .= '-' . Str::random(5);

        Category::create(['name'=>$data['name'],'slug'=>$slug]);
        return redirect()->route('categories.list')->with('success','Kategori ditambah.');
    }
}
