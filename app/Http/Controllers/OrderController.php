<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class OrderController extends Controller
{
    public function store(Request $request){

    	$data=new Order;
    	$data->email= $request->email;
        $data->product_code = $request->code;
        $data->product_name = $request->name;
        $data->quantity = $request->quantity;
    	$data->order_status = 0;
        $data->save();

        $item = Product::where('product_code',$request->code)->first();
        $item->stock = $item->stock - $request->quantity;
        $item->update();
        return Redirect()->route('all.orders');

    }
    public function storeItem(Request $request){
        $item = Item::where('item_code',$request->code)->first();
        foreach ($item->subProducts as $prod){
            $subProd = SubProduct::where('item_id',$item->id)->where('product_id',$prod->id)->first();
            $prod->stock = $prod->stock - ($subProd->value * $request->quantity);
            $prod->update();
        }
        $data=new Order;
        $data->email= $request->email;
        $data->product_code = $request->code;
        $data->product_name = $request->name;
        $data->quantity = $request->quantity;
        $data->order_status = 0;
        $data->save();

        $item->stock = $item->stock - $request->quantity;
        $item->update();

        return Redirect()->route('all.orders');

    }
     public function newStore(Request $request){

        $data=new Order;
        $data->email= $request->email;
        $data->product_code = $request->code;
        $data->product_name = $request->name;
        $data->quantity = $request->quantity;
        $data->order_status = 0;
        $data->save();

        //customer_track
        $customer = Customer::where('email', '=', $request->email)->first();
        if($customer === null){
            $data3=new Customer;
            $data3->name= $request->name;
            $data3->email= $request->email;
            $data3->company = $request->company;
            $data3->address = $request->address;
            $data3->phone = $request->phone;
            $data3->save();
        }
        return Redirect()->route('all.orders');

    }

    public function newformData(){
        $products = Product::all();
        $customers = Customer::get();
        return view('Admin.new_order',compact('products','customers'));
    }

    public function ordersData(){
        $orders = Order::all();
        return view('Admin.all_orders',compact('orders'));
    }

    public function pendingOrders(){
        $orders = Order::where('order_status','=','0')->get();
        return view('Admin.pending_orders',compact('orders'));
    }

    public function deliveredOrders(){
        $orders = Order::where('order_status','!=','0')->get();
        return view('Admin.delivered_orders',compact('orders'));
    }
}
