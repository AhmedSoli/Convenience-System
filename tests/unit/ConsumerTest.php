<?php 

use App\Consumer;

class ConsumerTest extends PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->consumer= new Consumer(['key_id'=>'123456','name'=>'name','password' =>'password']);
	}

	/** @test */
	function a_consumer_has_name()
	{
		$this->assertEquals('name',$this->consumer->name());
	} 

	/** @test */
	function a_consumer_has_password()
	{
		$this->assertEquals('password',$this->consumer->password());
	} 

	/** @test */
	function a_consumer_has_key_id()
	{
		$this->assertEquals('123456',$this->consumer->key_id());
	} 

	/** @test */
	function a_consumer_has_betrag()
	{
		$this->consumer->set_betrag(0);
		$this->assertEquals(0,$this->consumer->betrag());
	} 

	/** @test */
	function a_consumer_has_active()
	{
		$this->consumer->set_active(false);
		$this->assertEquals(false,$this->consumer->active());
	} 

	/** @test */
	function a_consumer_has_pfand()
	{
		$this->consumer->set_pfand(true);
		$this->assertEquals(true,$this->consumer->pfand());
	} 

	/** @test */
	function a_consumer_has_id()
	{
		$this->consumer->set_id(100);
		$this->assertEquals(100,$this->consumer->id());
	} 

}
