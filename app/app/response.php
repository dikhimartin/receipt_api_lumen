<?php

	function status_200(){
		$response = array(
	        "status"   =>200,
	        "message"  =>"OK"
	    );
	   return $response;
	}
	
	function status_201(){
		$response = array(
	        "status"   =>201,
	        "message"  =>"data_created"
	    );
	   return $response;
	}

	function status_204(){
		$response = array(
	        "status"   =>204,
	        "message"  =>"no_content_found"
	    );
	   return $response;
	}


	function status_304(){
		$response = array(
	        "status"   =>304,
	        "message"  =>"not_modified"
	    );
	   return $response;
	}

	function status_400(){
		$response = array(
	        "status"   =>400,
	        "message"  =>"bad_request"
	    );
	   return $response;
	}

	function status_401(){
		$response = array(
	        "status"   =>401,
	        "message"  =>"unauthorized"
	    );
	   return $response;
	}

	function status_403(){
		$response = array(
	        "status"   =>403,
	        "message"  =>"forbiden"
	    );
	   return $response;
	}

	function status_404(){
		$response = array(
	        "status"   =>404,
	        "message"  =>"server_not_found"
	    );
	   return $response;
	}

	function status_419(){
		$response = array(
	        "status"   =>419,
	        "message"  =>"token_invalid"
	    );
	   return $response;
	}

	function status_451(){
		$response = array(
	        "status"   =>451,
	        "message"  =>"redirect"
	    );
	   return $response;
	}

	function status_500(){
		$response = array(
	        "status"   =>500,
	        "message"  =>"internal_server_error"
	    );
	   return $response;
	}

	function status_503(){
		$response = array(
	        "status"   =>503,
	        "message"  =>"service_unavailable"
	    );
	   return $response;
	}

?>