<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Order;
use App\User;
use App\Product;
use App\Consumer;

class Transaction extends Model
{
    protected $fillable = [
    'amount' , 'booking_number' , 'consumer_id', 'note','user_id'
    ];

    public function amount(){
    	return $this->amount;
    }

    public function booking_number(){
    	return $this->booking_number;
    }

    public function consumer_id(){
    	return $this->consumer_id;
    }

    public function note(){
    	return $this->note;
    }

    public function user_id(){
    	return $this->user_id;
    }

    public function set_amount($amount){
    	$this->amount = $amount;
    }

    public function set_booking_number($booking_number){
    	$this->booking_number = $booking_number;
    }

    public function set_consumer_id($consumer_id){
    	$this->consumer_id = $consumer_id;
    }

    public function set_note($note){
    	$this->note = $note;
    }

    public function set_user_id($user_id){
    	$this->user_id = $user_id;
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function consumer()
    {
    	return $this->belongsTo(Consumer::class);
    }
}
