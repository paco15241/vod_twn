<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // relationships
    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }
}
