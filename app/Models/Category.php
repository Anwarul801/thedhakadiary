<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relation with Category table
    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id');
    }
    // relation with Category table
    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_cat_id');
    }

    // relation with post table
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id');
    }

}
