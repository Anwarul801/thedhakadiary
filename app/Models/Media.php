<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    //relation with photo gallery table
    public function photo_gallery()
    {
        return $this->belongsTo(PhotoGallery::class, 'photo_gallery_id');
    }
}
