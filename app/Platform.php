<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{

    protected $fillable = ['video_id','platform_name','title','description','page_url','provider','on_at','off_at'];

    // relationships
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    protected $dates = ["on_at", "off_at"];
}
