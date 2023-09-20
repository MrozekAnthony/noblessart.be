<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;
    protected $table = 'comment_to_post';

    public function replies()
    {
        return $this->hasMany(CommentPost::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(CommentPost::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
