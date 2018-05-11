<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
use App\User;
use App\Product;
use App\Consumer;

class Order extends Model
{
    
	protected $fillable = [
       'product_id','consumer_id','quantity','cost'
    ];
    
    public function consumer()
    {
        return $this->belongsTo(Consumer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function product_id(){
        return $this->product_id;
    }

    public function consumer_id(){
        return $this->consumer_id;
    }

    public function set_product_id($product_id){
        $this->product_id = $product_id;
    }

    public function set_consumer_id($consumer_id){
        $this->consumer_id = $consumer_id;
    }


    public function created_at(){
        return $this->created_at;
    }


}

