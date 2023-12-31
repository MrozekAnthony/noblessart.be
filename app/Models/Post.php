<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentPost::class, 'post_id')->whereNull('parent_id');
    }

    public function allComments()
    {
        return $this->hasMany(CommentPost::class, 'post_id');
    }
}
