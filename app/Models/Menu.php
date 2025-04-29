<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // relation with category table
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relation with page table
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // relation with menu table
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'parent_menu_id');
    }
}
