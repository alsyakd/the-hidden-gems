<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'author_name',
        'author_role',
        'featured_image',
        'published',
        'published_at',
        'category_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function getExcerptAttribute()
    {
        return $this->excerpt ?? Str::limit(strip_tags($this->content), 150);
    }
}
