<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Product;
use App\Consumer;
use App\Order;
use App\ProductsRegister;


class AppController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $product_coffee = Product::where('name','=','Coffee')->first();
        $product_lemonade = Product::where('name','=','Lemonade')->first();
        if($ip == $ip){
            $product_water = Product::where('name','=','Water')->first();
            $products  = [$product_coffee,$product_lemonade,$product_water];
        } else{
            $products  = [$product_coffee,$product_lemonade];
        }
        return view('app.home', compact('products'));
    }

    public function sign_in(){

        return view('app.sign_in');
    }


    public function consumer(Request $request){
        if($request->id){
            if($consumer = Consumer::where('id','=', $request->id)->first()){
                if (Hash::check($request->password, $consumer->password())){
                    $orders = $consumer->getOrders(0,10);
                    return view('app.consumer',compact('consumer','orders'));
                }
                flash('Wrong password!','danger');
                return back();
            }
            flash('Wrong ID!','danger');
            return back();
        }

        if($request->key_id){
            if($consumer = Consumer::where('key_id','=', $request->key_id)->first()){
                $orders = $consumer->getOrders(0,10);
                return view('app.consumer',compact('consumer','orders'));
            }  
            flash('KeyFob not registered yet!','info');
            return back();
        }
    }

    public function buy(Product $product,Request $request)
    {
        $cost = $product->price * $request->quantity;
        if($cost < 0) {
            flash('Operation not allowed!','danger');
            return back();
        }
        if($request->id){
            if($consumer = Consumer::where('id','=', $request->id)->first())
            {
                if(!$consumer->active){
                    flash('Operation failed. Your account is deactivated! Please refer back to one of the admins.','info');
                    return back();
                }
                if (Hash::check($request->password, $consumer->password()))
                {
                    $order = new Order(['consumer_id' => $consumer->id, 'product_id' =>$product->id, 'cost' => $cost, 'quantity' => $request->quantity]);
                    $consumer->set_betrag($consumer->betrag - $cost);
                    $product->set_quantity($product->quantity - $request->quantity);
                    $product->set_register($product->register + $cost);
                    $product->save();
                    $consumer->save();
                    $order->save();
                    $message = 'Transaction completed! Your current credit is ' . $consumer->betrag();
                    flash($message,'success');
                    return back();
                }
                flash('Wrong password!','danger');
                return back();
            }
            flash('Wrong ID!','danger');
            return back();
        }

        if($request->key_id){
            if($consumer = Consumer::where('key_id','=', $request->key_id)->first())
            {
                if(!$consumer->active){
                    flash('Your account is deactivated! Please refer back to one of the admins.','info');
                    return back();
                }
                $order = new Order(['consumer_id' => $consumer->id, 'product_id' =>$product->id, 'cost' => $cost, 'quantity' => $request->quantity]);
                $consumer->set_betrag($consumer->betrag - $cost);
                $product->set_quantity($product->quantity - $request->quantity);
                $product->set_register($product->register + $cost);
                $product->save();
                $consumer->save();
                $order->save();
                $message = 'Transaction completed! Your current credit is ' . $consumer->betrag();
                flash($message,'success');       
                return back();
            }  
            flash('Key ID not registered yet. Please refer to one of the admins.','info');
            return back();
        }
    }
}

