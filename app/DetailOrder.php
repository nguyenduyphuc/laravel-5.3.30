<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class DetailOrder extends Model
{
    
    public function order(){
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function product_order(){
        return $this->hasMany('App\Product', 'product_id');
    }

    public function getProduct($id)
    {
    	return Product::find($id);
    }

   
}
