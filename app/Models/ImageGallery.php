<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;
    protected $table = 'image_gallery';

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
