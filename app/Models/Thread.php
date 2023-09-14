<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    protected $table = 'thread';

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    // Dans le modèle Thread
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
