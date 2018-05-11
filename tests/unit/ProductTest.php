<?php 

use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->product= new Product(['name' =>'Test', 'photo' => 'test.png', 'price' => 1.3, 'quantity' => 50]);
	}

	/** @test */
	function a_product_has_name()
	{
		$this->assertEquals('Test',$this->product->name());
	} 

	/** @test */
	function a_product_has_photo()
	{
		$this->assertEquals('test.png',$this->product->photo());
	} 

	/** @test */
	function a_product_has_quantity()
	{
		$this->assertEquals(50,$this->product->quantity());
	} 

	/** @test */
	function a_product_has_price()
	{
		$this->assertEquals(1.3,$this->product->price());
	} 

	/** @test */
	function a_product_has_id()
	{
		$this->product->set_id(100);
		$this->assertEquals(100,$this->product->id());
	} 

}
