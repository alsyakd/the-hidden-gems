<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'published',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Post milik 1 Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Route model binding pakai slug
    public function getRouteKeyName() { return 'slug'; }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function getExcerptAttribute()
    {
        return $this->excerpt ?? Str::limit(strip_tags($this->content), 150);
    }
}
