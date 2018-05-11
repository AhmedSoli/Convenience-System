<?php

namespace App;

use App\User;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    'note','amount','product_id','booking_number','user_id',
    ];

    public function user_id(){
    	return $this->user_id;
    }


    public function amount(){
    	return $this->amount;
    }

    public function booking_number(){
    	return $this->booking_number;
    }

    public function note(){
    	return $this->note;
    }

    public function product_id(){
    	return $this->product_id;
    }

    public function set_user_id($user_id){
    	$this->user_id = $user_id;
    }

    public function set_amount($amount){
    	$this->amount = $amount;
    }

    public function set_booking_number($booking_number){
    	$this->booking_number = $booking_number;
    }

    public function set_note($note){
    	$this->note = $note;
    }

    public function set_product_id($product_id){
    	$this->product_id = $product_id;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
