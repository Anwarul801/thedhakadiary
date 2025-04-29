<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relation with adplacement table
    public function ad_placement()
    {
        return $this->belongsTo(AdPlacement::class, 'placement_id');
    }
}
