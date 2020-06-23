<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','title_en','description','description_en','poster_url','imdb_id','atmovies_id','douban_id'];

    // relationships
    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }
}
