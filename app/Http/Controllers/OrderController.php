<?php

namespace App\Http\Controllers;

use App\Media;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getList()
    {
        $preProcess = Order::where('status', 0)->orderBy('id', 'desc')->get();
        $processing = Order::where('status', 1)->orderBy('id', 'DESC')->get();
        $processed = Order::where('status', 2)->orderBy('id', 'DESC')->get();
        return view('admin.orders.list', compact('preProcess', 'processing', 'processed'));
    }
    public function orderDetail($id)
    {
    	$order =  Order::find($id);
    	return view('admin.orders.detail', compact('order'));
    }

    public function accept($id, $type)
    {

    	$order =  Order::find($id);
    	if ($order->method_payment == 'ctnh') {
    		if ($type == 'accpet' && $order->is_pay == 1) {
    			switch ($order->status) {
    			case 0:
    				$order->status = 1;
    				break;
    			case 1:
    				$order->status = 2;
    				break;
    			}
    		}else if ($type == 'accpet' && $order->is_pay == 0) {
    			return redirect()->back()->with('status', 'Đơn hàng này chưa thanh toán, vui lời đợi cho đến khi đơn hàng đã thành toán !');
    		}
    		if ($type == 'back') {
    			switch ($order->status) {
	    			case 1:
	    				$order->status = 0;
	    				break;
	    			case 2:
	    				$order->status = 1;
	    				break;
	    		}
    		}
    	}else{
    		if ($type == 'accpet') {
	    		switch ($order->status) {
	    			case 0:
	    				$order->status = 1;
	    				break;
	    			case 1:
	    				$order->status = 2;
	    				break;
	    		}
	    	}else{
	    		switch ($order->status) {
	    			case 1:
	    				$order->status = 0;
	    				break;
	    			case 2:
	    				$order->status = 1;
	    				break;
	    		}
	    	}
    	}
    	$order->save();
    	return redirect()->back();
    }

    public function getEdit($id)
    {
    	$order =  Order::find($id);
    	return view('admin.orders.edit', compact('order'));
    }

    public function postEdit(Request $request, $id)
    {
    	$order = Order::find($id);
    	$order->address = $request->address;
    	$order->method_payment = $request->method_payment;
    	if ($request->ispay == "on") {
    		$order->is_pay = 1;
    	}elseif ($request->ispay == null) {
    		$order->is_pay = 0;
    	}
    	if ($request->isship == "on") {
    		$order->is_ship =1;
    	}elseif ($request->isship == null) {
    		$order->is_ship =0;
    	}
    	$order->save();
    	return redirect()->to('admin/order/list');
    }
}
