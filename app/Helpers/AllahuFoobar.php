<?php
namespace App\Helpers;

class AllahuFoobar
{
	public static function randomAlphanumericId($length){

		$str = "";
    	
    	for($i=0; $i<$length; $i++){
    		if(random_int(1, 36) <= 26)
    		{
    			$str .= chr(rand(65,90)); // upper-case letter
    		}else{
    			$str .= chr(rand(48,57)); // digit
    		}
    		
    	}

    	return $str;
	}
}