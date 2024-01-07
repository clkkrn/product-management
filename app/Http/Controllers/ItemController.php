<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\SubProduct;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Product;

class ItemController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('auth');
    // }

    public function store(Request $request){

    	$data=new Item;
        $data->item_code=$request->code;
    	$data->name= $request->name;
        $data->category = $request->category;
    	$data->stock = $request->stock;
    	$data->unit_price = $request->unit_price;
    	// $data->total_price = $request->stock * $request->unit_price;
        $data->sales_unit_price = $request->sale_price;
        // $data->sales_stock_price =$request->stock * $request->sale_price;


        $data->save();
        return Redirect()->route('add.item');
    }

    public function allItems(){
        $items = Item::all();
    	return view('Admin.all_item',compact('items'));
    }

    public function availableItems(){
        $items = Item::where('stock','>','0')->get();
        return view('Admin.available_items',compact('items'));
    }

    public function formItemData($id){
        $item = Item::find($id);

        return view('Admin.add_item_order',compact('item'));
        // return view('Admin.add_order',['product'=>$product]);
    }

    public function purchaseItemData($id){
        $items = Item::find($id);

        return view('Admin.purchase_items',compact('items'));
    }

    public function storeItemPurchase(Request $request){

        Item::where('name',$request->name)->update(['stock' => $request->stock + $request->purchase]);

        return Redirect()->route('all.item');
    }

    public function addSubproduct($item_id)
    {
        $products = Product::all();
        return view('Admin.add_subproduct',compact('products','item_id'));
    }

    public function showSubproduct($item_id)
    {
        $item = Item::where('id',$item_id)->first();
        $subProducts = SubProduct::where('item_id',$item_id)->get();
        if ($subProducts == null ){
            $this->addSubproduct($item_id);
        }
        //dd($item->subproducts);
        return view('Admin.all_subproduct',compact('subProducts','item'));
    }
    public function deleteSubproduct($item_id,$product_id)
    {
        $res = SubProduct::where('product_id',$product_id)->where('item_id',$item_id)->delete();
        return $this->showSubproduct($item_id);
    }
    public function deleteItem($item_id)
    {
        $res = Item::where('id',$item_id)->delete();
        return redirect()->back();
    }

    public function insertSubproduct(Request $request)
    {
        $subProduct = new SubProduct;
        $subProduct->item_id = (integer)$request->itemid;
        $subProduct->product_id = (integer)$request->subproduct;
        $subProduct->value = (integer)$request->value;
        $subProduct->save();
        return $this->showSubproduct($request->itemid);
    }

}
