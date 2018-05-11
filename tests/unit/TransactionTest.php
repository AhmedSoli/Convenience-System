<?php 

use App\Transaction;

class TransactionTest extends PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->transaction= new Transaction([ 'amount' => 34.5, 'booking_number' => '123-456-789', 'consumer_id' => 34, 'note' => 'note', 'user_id' => 2]);
	}

	/** @test */
	function a_transaction_has_amount()
	{
		$this->assertEquals(34.5,$this->transaction->amount());
	} 

	/** @test */
	function a_transaction_has_booking_number()
	{
		$this->assertEquals('123-456-789',$this->transaction->booking_number());
	} 

	/** @test */
	function a_transaction_has_consumer_id()
	{
		$this->assertEquals(34,$this->transaction->consumer_id());
	} 

	/** @test */
	function a_transaction_has_note()
	{
		$this->assertEquals('note',$this->transaction->note());
	} 

	/** @test */
	function a_transaction_has_user_id()
	{
		$this->assertEquals(2,$this->transaction->user_id());
	} 




}
