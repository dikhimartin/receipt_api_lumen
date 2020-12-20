<?php

	function error_500(){
		$response = array(
	        "status"   =>500,
	        "message"  =>"Internal Server Error"
	    );
	   return $response;
	}


?>