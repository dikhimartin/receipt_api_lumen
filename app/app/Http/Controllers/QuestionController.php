<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    use Helpers;


    public function index(){
        $question = Question::all(); 

        $model    = new Question();
        $data     = $model->get_data();

        $result=array(
                "questions"  => $data,
        );

        return response($result);
    }

    public function indexCount(){
        $model    = new Question();
        $level    = $model->get_question_levels();

        $result = array();
        foreach ($level as $klev => $vlev) {
            $categories = $model->get_question_category_by_level_id($vlev->level_id);
            $category   =  array();
            foreach ($categories as $kcat => $vcat) {
                $count = $model->question_category_count($vcat->id, $vlev->level_id);
                $category[]=array(
                        "name"    => $vcat->category_name,
                        "count"   => $count,
                );
            }
            $result[]=array(
                    "level_name"     => $vlev->level_name,
                    "category"       => $category,
            );
        }

        return response($result);
    }

    public function show($id){
        // $question = Question::where('id',$id)->get();
        // return response ($question);

        $model    = new Question();
        $data     = $model->getDataById($id);

        $result=array(
                "questions"  => $data,
        );

        return response($result);
    }


    public function store (Request $request){
        // $this->validate($request, [
        //     'weight' => 'nullable',
        // ]);

        

        $question  = new Question();

        // if ($request->input('level_id') == ""){
        //     return response("level_id_is_required");
        // }

        

        $question->title = $request->input('title');
        $question->level_id = $request->input('level_id');
        $question->category_id = $request->input('category_id');
        $question->bobot = $request->input('bobot');
        $question->jawaban = $request->input('jawaban');
        $question->pertanyaan = $request->input('pertanyaan');
        $question->compiler = $request->input('compiler');
        $question->config = $request->input('config');
        $question->is_convert = 0;

        // $question->image = $request->input('image');


        // $avatar = Str::random(34);
        // $request->file('image')->move(storage_path('avatar'), $avatar);

        // $question->image = $avatar;

        // $question->image = $request->input('image');

        // if ($request->hasFile('image')) {
        //     // $avatar = Str::random(34);
        //     $avatar = $request->image->getClientOriginalName();
        //     $question->image = $request->file('image')->move(('avatar'), $avatar);
        // }

        $question->save();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_QUESTIONS'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Tambah Data');
    }

    // public function store(Request $request){
    //     $exploded = explode(',', $request->image);

    //     $decoded = base64_decode($exploded[1]);

    //     if(str_contains($exploded[0], 'jpeg'))
    //         $extension = 'jpg';
    //     else 
    //         $extension = 'png';

    //     $fileName = str_random().'.'.$extension;

    //     $path = public_path().'/'.$fileName;

    //     file_put_contents($path, $decoded);
        
    //     $question = Question::create($request->except('image') + [
    //         'image' => $fileName
    //     ]);
        
    //     return $question;
    // }

    public function update(Request $request, $id){
        
        $question = Question::where('id',$id)->first();

        // $avatar = Str::random(34);
        // $request->file('image')->move(storage_path('avatar'), $avatar);

        // if ($question) {
        //     $current_avatar_path = storage_path('avatar') . '/' . $question->image;
        //     if (file_exists($current_avatar_path)) {
        //         unlink($current_avatar_path);
        //     }
        //     $question->image = $avatar;
        //     } else {
        //     $question = new Question;
        //     $question->image = $avatar;
        //     }

        $question->title = $request->input('title');
        $question->level_id = $request->input('level_id');
        $question->category_id = $request->input('category_id');
        $question->bobot = $request->input('bobot');
        $question->jawaban = $request->input('jawaban');
        $question->pertanyaan = $request->input('pertanyaan');
        $question->compiler = $request->input('compiler');
        $question->config = $request->input('config');
        $question->is_convert = 0;
        
        // $question->image = $request->input('image');
        
        // if ($request->hasFile('image')) {
        //     // $avatar = Str::random(34);
        //     $avatar = $request->image->getClientOriginalName();
        //     $question->image = $request->file('image')->move(('avatar'), $avatar);
        // }

        
        
        
        
        $question->save();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_QUESTIONS'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);

        // $this->validate($request, [
        //     'image' => 'required|image',
        //     'title' => 'required|string',
        //     'level_id' => 'required|integer'
        // ]);
        
        
        return response('Berhasil Merubah Data');
    }

    // public function get_avatar($name)
    // {
    //     $avatar_path = ('avatar') . '/' . $name;
    //     if (file_exists($avatar_path)) {
    //     $file = file_get_contents($avatar_path);
    //     return response($file, 200);
    //     }
    //     $res['success'] = false;
    //     $res['message'] = "Avatar not found";
        
    //     return $res;
    // }
    
    public function destroy($id){
        $question = Question::where('id',$id)->first();
        $question->delete();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_QUESTIONS'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Menghapus Data');
    }
}