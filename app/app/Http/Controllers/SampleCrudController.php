<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\SampleCrud;

class SampleCrudController extends Controller{

    public function index(Request $request){ 
        return response()->json(status_200(), 200);
    }

}
