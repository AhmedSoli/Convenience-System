<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Transaction;
use App\User;
use App\Consumer;
use App\Payment;

class Product extends Model
{

	protected $fillable = [
    'name', 'price', 'photo','quantity','register',
    ];

    /**
     *
     * Relations
     *
     */
    

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(){
        return Order::where('product_id', '=', $this->id)->OrderBy('created_at','desc')->Paginate(15,['*'],'orders');
    }

    public function getPayments(){
        return Payment::where('product_id', '=', $this->id)->OrderBy('created_at','desc')->Paginate(15,['*'],'payments');
    }


    /**
     *
     * getters
     *
     */
    


    public function name(){
        return $this->name;
    }

    public function photo(){
        return $this->photo;
    }

    public function price(){
        return $this->price;
    }

    public function quantity(){
        return $this->quantity;
    }

    public function register(){
        return $this->register;
    }

    public function id(){
        return $this->id;
    }

    /**
     *
     * setters
     *
     */
    

    public function set_name($name){
        $this->name = $name;
    }

    public function set_photo($photo){
        $this->photo = $photo;
    }

    public function set_price($price){
        $this->price = $price;
    }

    public function set_quantity($quantity){
        $this->quantity = $quantity;
    }

    public function set_register($register){
        $this->register = $register;
    }

    public function set_id($id){
        $this->id = $id;
    }

    


}
