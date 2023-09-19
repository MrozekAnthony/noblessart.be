<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Thread extends Model
{
    use HasFactory;
    protected $table = 'thread';

    // Dans le modèle Thread
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Dans le modèle Thread
    public function category()
    {
        return $this->belongsTo(ThreadCategory::class, 'thread_category_id');
    }
}
