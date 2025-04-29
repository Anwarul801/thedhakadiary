<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relation with category table
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //relation with Section table
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'post_section');
    }

    // relation with author table
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    // relation with media table
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
