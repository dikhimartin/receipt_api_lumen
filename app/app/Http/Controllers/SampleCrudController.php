<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SampleCrud;

class SampleCrudController extends Controller{


    public function index(Request $request){ 
        return response()->json("10", 500);
    }

}

	// function error_500(){
	// 	$response = array(
	//         "status"   =>500,
	//         "message"  =>"Internal Server Error"
	//     );
	//    return $response;
	// }