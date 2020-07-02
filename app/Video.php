<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title','title_en','description','description_en','year','poster_url','imdb_id','atmovies_id','douban_id','status'];

    protected $dates = ['deleted_at'];

    // relationships
    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }
}
