<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Str;


class Question extends Model
{
    protected $fillable = [
        'title', 
        'level_id', 
        'category_id', 
        'bobot', 
        'jawaban', 
        'pertanyaan', 
        'compiler',
        'config', 
        'is_convert'
    ];

    protected $hidden   = ['created_at', 'updated_at'];


    public function get_data(){
        $data = DB::table('questions')
                ->select(
                    'questions.id',
                    'questions.title',
                    'questions.level_id',
                    'questions.category_id',
                    'questions.bobot',
                    'questions.jawaban',
                    'questions.pertanyaan',
                    'questions.compiler',
                    'questions.config',
                    'questions.is_convert',
                    'questions.created_at',
                    'questions.updated_at',
                    'question_levels.id as level_id',
                    'question_levels.name as level_name',
                    'question_categories.id as category_id',
                    'question_categories.name as category_name',
                )
                ->leftJoin('question_levels', 'questions.level_id', '=', 'question_levels.id')
                ->leftJoin('question_categories', 'questions.category_id', '=', 'question_categories.id')
                ->get();
        
        return $data;
    }

    // martin
    public function get_question_levels(){
        $data = DB::table('questions')
                ->select(
                    'questions.level_id',
                    'question_levels.name AS level_name'
                )
                ->leftJoin('question_levels', 'questions.level_id', '=', 'question_levels.id')
                ->groupBy('questions.level_id')
                ->groupBy('question_levels.name')
                ->orderBy('questions.level_id', 'asc')
                ->get();
        return $data;
    }

    public function get_question_category_by_level_id($id){
        $data = DB::table('questions')
                ->select(
                    'question_categories.id',
                    'question_categories.name as category_name',
                )
                ->leftJoin('question_categories', 'questions.category_id', '=', 'question_categories.id')
                ->where('questions.level_id', '=', $id)
                ->groupBy('question_categories.id')
                ->groupBy('question_categories.name')
                ->get();
        return $data;
    }

    public function question_category_count($category_id, $level_id){
        $data = DB::table('questions')
        ->where('questions.category_id', '=', $category_id)
        ->where('questions.level_id', '=', $level_id)
        ->count();
        return $data;
    }



    // 


    public function getDataById($id){
        $data = DB::table('questions')
                ->select(
                    'questions.id',
                    'questions.title',
                    'questions.level_id',
                    'questions.category_id',
                    'questions.bobot',
                    'questions.jawaban',
                    'questions.pertanyaan',
                    'questions.compiler',
                    'questions.config',
                    'questions.is_convert',
                    'questions.created_at',
                    'questions.updated_at',
                    'question_levels.id as level_id',
                    'question_levels.name as level_name',
                    'question_categories.id as category_id',
                    'question_categories.name as category_name',
                )
                ->leftJoin('question_levels', 'questions.level_id', '=', 'question_levels.id')
                ->leftJoin('question_categories', 'questions.category_id', '=', 'question_categories.id')
                ->where('questions.id', '=', $id)
                ->get();
        
        return $data;
    }

    public function Level(){
        $level = DB::table('questions')
                ->leftJoin('question_levels', 'questions.level_id', '=', 'question_levels.id')
                ->first();
                return $level;
    }
}
