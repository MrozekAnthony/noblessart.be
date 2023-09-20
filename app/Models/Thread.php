<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Thread extends Model
{
    use HasFactory;
    protected $table = 'thread';

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(ThreadCategory::class, 'thread_category_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentThread::class, 'thread_id')->whereNull('parent_comment_id');
    }
}
