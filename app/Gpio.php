<?php

namespace App;

class Gpio {
	private $pins;
	
	public function __construct(){
		$this->pins = array(3=>8,5=>9,7=>7,11=>0,13=>2,15=>3,19=>12,21=>13,23=>14,8=>15,
			10=>16,12=>1,16=>4,18=>5,22=>6,24=>10,26=>11);
	}
	public function setPinMode($pin, $mode){
		exec("gpio mode ".$pin." ".$mode);
	}
	public function getPinState($pin){
		$return = array();
		exec("gpio read ".$pin,$return);
		return (trim($return[0])=="1"?'on':'off');
	}
	
	public function setPinState($pin, $state){
		exec("gpio write ".$pin." ".$state);
	}
	
	public function test(){
		exec("sleep 10 > /dev/null 2>/dev/null &");
	}
	
	public function fermerTemp(){
		$request->query("temp");
		exec("")
	}
	
	
}