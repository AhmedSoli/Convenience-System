<?php 

use App\User;

class UserTest extends PHPUnit_Framework_TestCase
{
	public function setUp(){
		$this->user= new User(['email' => 'name@email.com','name' => 'name','password' =>'password', 'betrag' => 0]);
	}

	/** @test */
	function a_user_has_email()
	{
		$this->assertEquals('name@email.com',$this->user->email());
	} 

	/** @test */
	function a_user_has_name()
	{
		$this->assertEquals('name',$this->user->name());
	} 

	/** @test */
	function a_user_has_password()
	{
		$this->assertEquals('password',$this->user->password());
	} 

	/** @test */
	function a_user_has_betrag()
	{
		$this->assertEquals(0,$this->user->betrag());
	} 


}
