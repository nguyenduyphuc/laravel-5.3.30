<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
class Order extends Model
{
    public function detail(){
        return $this->hasMany('App\DetailOrder', 'order_id');
    }

    public function getCustomer($id)
    {
    	return Customer::find($id);
    }
}
