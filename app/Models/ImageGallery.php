<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;


    public function gallery_images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
