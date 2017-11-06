<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Media extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'media';

    protected $fillable = ['model_id', 'model_type','collection_name', 'name', 'file_name', 'disk', 'size', 'manipulations', 'custom_properties', 'order_column'];

    public function productMedia(){
        return $this->belongsTo('App\ProductMedia');
    }

}
