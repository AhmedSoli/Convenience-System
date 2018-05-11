<?php 

use App\Payment;

class PaymentTest extends PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->payment= new Payment(['amount' => 15.3,'booking_number' => '1234-2342-234234-234','note' => 'note', 'product_id' => 2,'user_id' =>3]);
	}

	/** @test */
	function a_payment_has_amount()
	{
		$this->assertEquals(15.3,$this->payment->amount());
	} 

	/** @test */
	function a_payment_has_booking_number()
	{
		$this->assertEquals('1234-2342-234234-234',$this->payment->booking_number());
	} 

	/** @test */
	function a_payment_has_note()
	{
		$this->assertEquals('note',$this->payment->note());
	} 

	/** @test */
	function a_payment_has_product_id()
	{
		$this->assertEquals(2,$this->payment->product_id());
	} 

	/** @test */
	function a_payment_has_user_id()
	{
		$this->assertEquals(3,$this->payment->user_id());
	} 


}
