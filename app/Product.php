<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quantity','description', 'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function orders()
    {
        return $this->morphMany('App\Order', 'orderable');
    }
}
