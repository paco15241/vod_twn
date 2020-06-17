<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    // relationships
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    protected $dates = ["on_at", "off_at"];
}
