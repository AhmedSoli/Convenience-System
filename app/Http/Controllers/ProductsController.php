<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Order;
use App\Consumer;
use DB;



class ProductsController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function view_all(){
        $products = Product::all();
        return view('admin.products',compact('products'));
    }

    public function view_single(Product $product)   
    {
        $orders = $product->getOrders();
        $payments = $product->getPayments();
        $orders->load('consumer');
        $payments->load('user');
        $page = 'product';
        return view('admin.product',compact('orders','payments','product',
            'page'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $product = new Product($request->all());
        $product->save();
        return back();
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  Product  $product
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Product $product)        
    {
        $product->update($request->all());
        return back();
        
    }

     /**
     * Delete product from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
