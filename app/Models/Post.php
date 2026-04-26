<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    // relation with category table
//    public function categories()
//    {
//        return $this->belongsToMany(Category::class);
//    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot('position');
    }
    //relation with Section table
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'post_section');
    }

    // relation with author table
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    // relation with media table
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
