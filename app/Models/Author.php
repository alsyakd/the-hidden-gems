<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'birth',
        'bio',
    ];

    // Relasi: 1 Author dimiliki 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: 1 Author punya banyak Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
