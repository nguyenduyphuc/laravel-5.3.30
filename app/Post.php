<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Post extends Model implements HasMedia
{

	use HasMediaTrait;

    public function page(){
        return $this->belongsTo('App\Page', 'page_id');
    }
   

}
