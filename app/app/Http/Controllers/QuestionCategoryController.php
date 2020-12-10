<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\QuestionCategory;

class QuestionCategoryController extends Controller
{
    use Helpers;


    public function index(){
        $questioncategory = QuestionCategory::all();
        return response($questioncategory);
    }
    public function show($id){
        $questioncategory = QuestionCategory::where('id',$id)->get();
        return response ($questioncategory);
    }


    public function store (Request $request){
        $questioncategory = new QuestionCategory();
        $questioncategory->name = $request->input('name');
        $questioncategory->save();
    
        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id){
        $questioncategory = QuestionCategory::where('id',$id)->first();
        $questioncategory->name = $request->input('name');
        $questioncategory->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function destroy($id){
        $questioncategory = QuestionCategory::where('id',$id)->first();
        $questioncategory->delete();
    
        return response('Berhasil Menghapus Data');
    }
}