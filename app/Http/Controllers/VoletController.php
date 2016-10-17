<?php

namespace App\Http\Controllers;

use App\Gpio;
use Illuminate\Http\Request;
use SuperClosure\Serializer;

class VoletController extends Controller{
	
	public function ouvrir(Request $request){
		$gpio = new Gpio();
		
		$gpio->setPinState(2, 1);
		$gpio->setPinState(1,0);
		
		// $this->wait();
		return response()->jsonp($request->query("callback"), "ok");
	}
	
	
	
	public function fermer(Request $request){
		$gpio = new Gpio();

		$gpio->setPinState(1, 1);
		$gpio->setPinState(2, 0);
		
		// sleep(1);
		return response()->jsonp($request->query("callback"), "ok");
	}

	public function stop(Request $request){
		$gpio = new Gpio();
		$gpio->setPinState(1,1);
    	$gpio->setPinState(2,1);
		return response()->jsonp($request->query("callback"), "ok");
	}


	public function wait(){
        
        // environment
        $environment = \App::environment();
        // command
        $command = 'php '.base_path().'/artisan wait:volet --env='.$environment.' &';
        // execute
        exec($command);
	}
	
	public function test(Request $request){
		$gpio = new Gpio();
		$gpio->test();
		return response()->jsonp($request->query("callback"), "ok");
	}
}