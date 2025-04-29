<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    //relation with media table
    public function media()
    {
        return $this->hasMany(Media::class, 'photo_gallery_id');
    }
}
