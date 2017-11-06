<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\State;
use App\District;
use App\DetailOrder;
use App\Http\Requests\CustomerRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;
use App\Mail\OrderShipped;
class CustomerController extends Controller
{
    public function addCustomter(CustomerRequest $request)
    {
    	# code...
    	$customer =  new Customer();
    	$customer->email =  $request->email;
    	$customer->name =  $request->name;
    	$customer->phone =  $request->phone;
    	$customer->address =  $request->address;
        $customer->company =  $request->company;
    	$customer->state =  $request->state;
    	$customer->district =  $request->district;
    	$customer->save();

        $order =  new Order();
        $order->name = "#000".(Order::count()+1);
        $order->customer_id = $customer->id;
        $order->address =  $request->address;
        $order->feeship = $request->feeship;
        $order->total =  $request->total;
        $order->method_payment = $request->methodpayment;
        $order->is_pay = 0;
        $order->is_ship = 0;
        $order->status = 0;
        $order->save();
        
        Mail::to($request->email)->send(new OrderShipped($order));


        $cart = Cart::content();
        foreach (Cart::content() as $item) {
            $detail_order = new DetailOrder();
            $detail_order->order_id =  $order->id;
            $detail_order->product_id = $item->id;
            $detail_order->quantity = $item->qty;
            $detail_order->save();
        }
        Cart::destroy();
    	return redirect()->route('success')->with('cart', $cart)->with('order', $order)->with('customer', $customer);
    }

    public function getList()
    {
        $customers =  Customer::all();
        return view('admin.customers.list', compact('customers'));
    }

    public function getEdit($id)
    {
        $customer = Customer::find($id);
        $states = State::all();
        $districts = District::where('state_id', State::where('value', $customer->state)->first()->id)->get();
        if ($customer == null) {
           return redirect('admin/customer/list');
        }
        
        return view('admin.customers.edit', compact('customer', 'states', 'districts'));
    }

    public function postEdit($id, CustomerRequest $request)
    {
        $customer = Customer::find($id);

        $customer->email =  $request->email;
        $customer->name =  $request->name;
        $customer->phone =  $request->phone;
        $customer->address =  $request->address;
        $customer->company =  $request->company;
        $customer->state =  $request->state;
        $customer->district =  $request->district;
        $customer->save();
        return redirect('admin/customer/list');        
    }

    public function getDistrict(Request $request)
    {
        $state = $request->selectedState;
        $district =  District::where('state_id', State::where('value', $state)->first()->id)->get();
        return  $district;
    }
}
