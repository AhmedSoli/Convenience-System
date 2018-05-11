<?php

namespace App;

use App\Order;
use App\Transaction;
use App\User;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password','key_id','betrag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password'
    ];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    public function getOrders(){

        return Order::where('consumer_id','=', $this->id)->orderBy('created_at','desc')->paginate(15,['*'],'orders');

    }

    public function getTransactions(){

        return Transaction::where('consumer_id','=', $this->id)->orderBy('created_at','desc')->paginate(15,['*'],'transactions');

    }

    public function password(){
        return $this->password;
    }

    public function name(){
        return $this->name;
    }

    public function key_id(){
        return $this->key_id;
    }

    public function betrag(){
        return $this->betrag;
    }

    public function active(){
        return $this->active;
    }

    public function pfand(){
        return $this->pfand;
    }

    public function id(){
        return $this->id;
    }

    public function set_name($name){
        $this->name = $name;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_key_id($key_id){
        $this->key_id = $key_id;
    }

    public function set_betrag($betrag){
        $this->betrag = $betrag;
    }

    public function set_active($active){
        $this->active = $active;
    }

    public function set_pfand($pfand){
        $this->pfand = $pfand;
    }

    public function set_id($id){
        $this->id = $id;
    }



}