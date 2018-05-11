<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Order;
use App\User;
use App\Product;
use App\Consumer;

class RegisterTransaction extends Model
{
    protected $fillable = [
    'amount' , 'booking_number' , 'sender_id', 'note','reciever_id'
    ];

    public function amount(){
    	return $this->amount;
    }

    public function booking_number(){
    	return $this->booking_number;
    }

    public function sender_id(){
    	return $this->sender_id;
    }

    public function note(){
    	return $this->note;
    }


    public function reciever_id(){
    	return $this->reciever_id;
    }

    public function set_amount($amount){
    	$this->amount = $amount;
    }

    public function set_booking_number($booking_number){
    	$this->booking_number = $booking_number;
    }

    public function set_sender_id($sender_id){
    	$this->sender_id = $sender_id;
    }

    public function set_note($note){
    	$this->note = $note;
    }

    public function set_reciever_id($reciever_id){
    	$this->reciever_id = $reciever_id;
    }

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function reciever()
    {
        return $this->belongsTo('App\User', 'reciever_id');
    }




}
