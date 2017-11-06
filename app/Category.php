<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function product(){
        return $this->hasMany('App\Product', 'category_id');
    }
    public function getParent($id){
        return Category::find($id);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    // public static function tree($id)
    // {
    //     return static::with(implode('.', array_fill(0, 4, 'children')))->find($id);
    // }

    // public static function treeParents($id)
    // {
    //     return static::with(implode('.', array_fill(0, 4, 'parent')))->find($id);
    // }
}
