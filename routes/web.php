<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//item
Route::get('/add-item', function () {
    return view('Admin.add_item');
})->middleware(['auth'])->name('add.item');

Route::post('/insert-item',[ItemController::class,'store'])->middleware(['auth']);

Route::get('/all-item',[ItemController::class,'allItems'])->middleware(['auth'])->name('all.item');
Route::get('/delete-item/{item_id}',[ItemController::class,'deleteItem'])->middleware(['auth'])->name('delete.item');

Route::get('/available-items',[ItemController::class,'availableItems'])->middleware(['auth'])->name('available.items');

Route::get('/purchase-items/{id}', [ItemController::class,'purchaseItemData'])->middleware(['auth']);

Route::post('/insert-purchase-items',[ItemController::class,'storeItemPurchase'])->middleware(['auth']);
Route::get('/add-subproduct/{item_id}',[ItemController::class,'addSubproduct'])->middleware(['auth'])->name('add.subproduct');
Route::get('/show-subproduct/{item_id}',[ItemController::class,'showSubproduct'])->middleware(['auth'])->name('show.subproduct');
Route::get('/delete-subproduct/{item_id}/{product_id}',[ItemController::class,'deleteSubproduct'])->middleware(['auth'])->name('delete.subproduct');
Route::post('/insert-subproduct',[ItemController::class,'insertSubproduct'])->middleware(['auth'])->name('insert.subproduct');

//product
Route::get('/add-product', function () {
    return view('Admin.add_product');
})->middleware(['auth'])->name('add.product');

Route::post('/insert-product',[ProductController::class,'store'])->middleware(['auth']);
Route::post('/edit-product/{id}',[ProductController::class,'edit'])->middleware(['auth']);


Route::get('/all-product',[ProductController::class,'allProduct'])->middleware(['auth'])->name('all.product');
Route::get('/delete-product/{prod_id}',[ProductController::class,'deleteProduct'])->middleware(['auth'])->name('delete.product');
Route::get('/edit-product/{prod_id}',[ProductController::class,'editProduct'])->middleware(['auth'])->name('edit.product');

Route::get('/available-products',[ProductController::class,'availableProducts'])->middleware(['auth'])->name('available.products');

Route::get('/purchase-products/{id}', [ProductController::class,'purchaseData'])->middleware(['auth']);

Route::post('/insert-purchase-products',[ProductController::class,'storePurchase'])->middleware(['auth']);


//invoice
Route::get('/add-invoice/{id}', [InvoiceController::class,'formData'])->middleware(['auth']);

Route::get('/new-invoice', [InvoiceController::class,'newformData'])->middleware(['auth'])->name('new.invoice');

Route::post('/insert-invoice',[InvoiceController::class,'store'])->middleware(['auth']);

Route::get('/invoice-details', function () {
    return view('Admin.invoice_details');
})->middleware(['auth'])->name('invoice.details');

Route::get('/all-invoice', [InvoiceController::class,'allInvoices'])->middleware(['auth'])->name('all.invoices');

Route::get('/sold-products',[InvoiceController::class,'soldProducts'])->middleware(['auth'])->name('sold.products');
// Route::get('/delete', [InvoiceController::class,'delete']);


//order
Route::get('/add-item-order/{name}', [ItemController::class,'formItemData'])->middleware(['auth'])->name('add.item.order');
Route::post('/insert-item-order',[OrderController::class,'storeItem'])->middleware(['auth']);

Route::get('/add-order/{name}', [ProductController::class,'formData'])->middleware(['auth'])->name('add.order');
Route::post('/insert-order',[OrderController::class,'store'])->middleware(['auth']);


Route::get('/all-orders',[OrderController::class,'ordersData'])->middleware(['auth'])->name('all.orders');

Route::get('/pending-orders',[OrderController::class,'pendingOrders'])->middleware(['auth'])->name('pending.orders');

Route::get('/delivered-orders',[OrderController::class,'deliveredOrders'])->middleware(['auth'])->name('delivered.orders');

Route::get('/new-order', [OrderController::class,'newformData'])->middleware(['auth'])->name('new.order');

Route::post('/insert-new-order',[OrderController::class,'newStore'])->middleware(['auth']);


//customer
Route::get('/add-customer', function () {
    return view('Admin.add_customer');
})->middleware(['auth'])->name('add.customer');

Route::post('/insert-customer',[CustomerController::class,'store'])->middleware(['auth']);

Route::get('/edit-customer/{id}',[CustomerController::class,'edit'])->middleware(['auth']);
Route::post('/update-customer/{id}',[CustomerController::class,'update'])->middleware(['auth']);


Route::get('/all-customers',[CustomerController::class,'customersData'])->middleware(['auth'])->name('all.customers');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
