<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Str;


class UserSchedule extends Model
{
    protected $fillable = [
        'user_id', 'schedule_id'
    ];

    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];


    public function get_data(){
        $data = DB::table('user_schedules')
                ->select(
                    'user_schedules.id',
                    'user_schedules.user_id',
                    'user_schedules.schedule_id',
                    'user_schedules.created_at',
                    'user_schedules.updated_at',
                    'user_schedules.deleted_at',
                    'users.id as user_id',
                    'users.fullname as user_name',
                    'schedules.id as schedule_id',
                    'schedules.title as schedule_name',
                )
                ->leftJoin('users', 'user_schedules.user_id', '=', 'users.id')
                ->leftJoin('schedules', 'user_schedules.schedule_id', '=', 'schedules.id')
                ->where('users.id','=',\Auth::user()->id)
                ->get();
        
        return $data;
    }

    public function get_data_all(){
        $data = DB::table('user_schedules')
                ->select(
                    'user_schedules.id',
                    'user_schedules.user_id',
                    'user_schedules.schedule_id',
                    'user_schedules.created_at',
                    'user_schedules.updated_at',
                    'user_schedules.deleted_at',
                    'users.id as user_id',
                    'users.fullname as user_name',
                    'schedules.id as schedule_id',
                    'schedules.title as schedule_name',
                )
                ->leftJoin('users', 'user_schedules.user_id', '=', 'users.id')
                ->leftJoin('schedules', 'user_schedules.schedule_id', '=', 'schedules.id')
                ->get();
        
        return $data;
    }

    public function get_data_all_id($id){
        $data = DB::table('user_schedules')
                ->select(
                    'user_schedules.id',
                    'user_schedules.user_id',
                    'user_schedules.schedule_id',
                    'user_schedules.created_at',
                    'user_schedules.updated_at',
                    'user_schedules.deleted_at',
                    'users.id as user_id',
                    'users.fullname as user_name',
                    'schedules.id as schedule_id',
                    'schedules.title as schedule_name',
                )
                ->leftJoin('users', 'user_schedules.user_id', '=', 'users.id')
                ->leftJoin('schedules', 'user_schedules.schedule_id', '=', 'schedules.id')
                ->where('user_schedules.schedule_id', '=', $id)
                ->get();
        
        return $data;
    }

    public function getDataById($id){
        $data = DB::table('user_schedules')
                ->select(
                    'user_schedules.id',
                    'user_schedules.user_id',
                    'user_schedules.schedule_id',
                    'user_schedules.created_at',
                    'user_schedules.updated_at',
                    'user_schedules.deleted_at',
                    'users.id as user_id',
                    'users.fullname as user_name',
                    'schedules.id as schedule_id',
                    'schedules.title as schedule_name',
                )
                ->leftJoin('users', 'user_schedules.user_id', '=', 'users.id')
                ->leftJoin('schedules', 'user_schedules.schedule_id', '=', 'schedules.id')
                ->where('users.id','=',\Auth::user()->id)
                ->where('user_schedules.schedule_id', '=', $id)
                ->get();

        return $data;
    }

    public function getDetail($id){
        $data = DB::table('user_schedules')
                ->select(
                    'user_schedules.id',
                    'user_schedules.user_id',
                    'user_schedules.schedule_id',
                    'user_schedules.created_at',
                    'user_schedules.updated_at',
                    'user_schedules.deleted_at',
                    'users.id as user_id',
                    'users.fullname as user_name',
                    'schedules.id as schedule_id',
                    'schedules.title as schedule_name',
                )
                ->leftJoin('users', 'user_schedules.user_id', '=', 'users.id')
                ->leftJoin('schedules', 'user_schedules.schedule_id', '=', 'schedules.id')
                ->where('user_schedules.id','=',$id)
                ->get();
        
        return $data;
    }
}
