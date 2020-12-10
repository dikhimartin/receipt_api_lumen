<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Schedule extends Model
{
    protected $fillable = [
        'title', 'start', 'end', 'durasi', 'category_id', 'level_id', 'jumlah_soal', 'status'
    ];

    protected $hidden   = ['created_at', 'updated_at'];

    public function get_data(){
        $data = DB::table('schedules')
                ->select(
                    'schedules.id',
                    'schedules.title',
                    'schedules.level_id',
                    'schedules.category_id',
                    'schedules.start',
                    'schedules.end',
                    'schedules.durasi',
                    'schedules.jumlah_soal',
                    'schedules.status',
                    'schedules.created_at',
                    'schedules.updated_at',
                    'question_levels.id as level_id',
                    'question_levels.name as level_name',
                    'question_categories.id as category_id',
                    'question_categories.name as category_name',
                )
                ->leftJoin('question_levels', 'schedules.level_id', '=', 'question_levels.id')
                ->leftJoin('question_categories', 'schedules.category_id', '=', 'question_categories.id')
                ->orderBy('schedules.start', 'desc')
                ->get();
        
        return $data;
    }

    public function get_data_status_1(){
        $data = DB::table('schedules')
                ->select(
                    'schedules.id',
                    'schedules.title',
                    'schedules.level_id',
                    'schedules.category_id',
                    'schedules.start',
                    'schedules.end',
                    'schedules.durasi',
                    'schedules.jumlah_soal',
                    'schedules.status',
                    'schedules.created_at',
                    'schedules.updated_at',
                    'question_levels.id as level_id',
                    'question_levels.name as level_name',
                    'question_categories.id as category_id',
                    'question_categories.name as category_name',
                )
                ->leftJoin('question_levels', 'schedules.level_id', '=', 'question_levels.id')
                ->leftJoin('question_categories', 'schedules.category_id', '=', 'question_categories.id')
                ->where('schedules.status', '=', '1')
                ->orderBy('schedules.start', 'desc')
                ->get();
        
        return $data;
    }

    public function getDataById($id){
        $data = DB::table('schedules')
                ->select(
                    'schedules.id',
                    'schedules.title',
                    'schedules.level_id',
                    'schedules.category_id',
                    'schedules.start',
                    'schedules.end',
                    'schedules.durasi',
                    'schedules.jumlah_soal',
                    'schedules.status',
                    'schedules.created_at',
                    'schedules.updated_at',
                    'question_levels.id as level_id',
                    'question_levels.name as level_name',
                    'question_categories.id as category_id',
                    'question_categories.name as category_name',
                )
                ->leftJoin('question_levels', 'schedules.level_id', '=', 'question_levels.id')
                ->leftJoin('question_categories', 'schedules.category_id', '=', 'question_categories.id')
                ->where('schedules.id', '=', $id)
                ->get();
        
        return $data;
    }
}
