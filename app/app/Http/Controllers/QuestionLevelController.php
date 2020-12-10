<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\QuestionLevel;

class QuestionLevelController extends Controller
{
    use Helpers;


    public function index(){
        $questionlevel = QuestionLevel::all();
        return response($questionlevel);
    }
    public function show($id){
        $questionlevel = QuestionLevel::where('id',$id)->get();
        return response ($questionlevel);
    }


    public function store (Request $request){
        $questionlevel = new QuestionLevel();
        $questionlevel->name = $request->input('name');
        $questionlevel->save();
    
        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id){
        $questionlevel = QuestionLevel::where('id',$id)->first();
        $questionlevel->name = $request->input('name');
        $questionlevel->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function destroy($id){
        $questionlevel = QuestionLevel::where('id',$id)->first();
        $questionlevel->delete();
    
        return response('Berhasil Menghapus Data');
    }
}