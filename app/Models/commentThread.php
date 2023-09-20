<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentThread extends Model
{
    use HasFactory;
    protected $table = 'comment_to_thread';

    public function replies()
    {
        return $this->hasMany(CommentThread::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(CommentThread::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
