<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function post(){
        return $this->hasMany('App\Post', 'page_id');
    }
}
