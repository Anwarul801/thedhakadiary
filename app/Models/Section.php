<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // relation with Post table

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_section');
    }
}
