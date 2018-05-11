<?php 

use App\Order;
use App\Product;
use App\Consumer;

class OrderTest extends PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->consumer= new Consumer(['key_id'=>'123456','name'=>'name','password' =>'password']);
		$this->product= new Product(['name' =>'Test', 'photo' => 'test.png', 'price' => 1.3, 'quantity' => 50]);
		$this->consumer->set_id(1000);
		$this->product->set_id(1000);
		$this->order= new Order(['consumer_id' => $this->consumer->id(), 'product_id' => $this->product->id()]);
	}

	/** @test */
	function an_order_has_consumer_id()
	{
		$this->assertEquals(1000,$this->order->consumer_id());
	} 
	/** @test */
	function an_order_has_product_id()
	{
		$this->assertEquals(1000,$this->order->product_id());
	} 




}

