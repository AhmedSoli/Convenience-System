<?php 

function flash($message, $level = 'info'){
	session()->flash('flash_message',$message);
	session()->flash('flash_level',$level);
}
