<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'photo', 
        'gender', 
        'religion', 
        'maritalstatus', 
        'id_type', 
        'id_number', 
        'email', 
        'phone', 
        'weight', 
        'height', 
        'address', 
        'country_id', 
        'province_id',
        'province_name', 
        'city_id', 
        'city_name',
        'dob', 
        'pob', 
        'jobtitle', 
        'bio'
    ];

    protected $hidden   = ['created_at', 'updated_at'];

    public function getDataById($id){
        $data = DB::table('profiles')
                ->select('*')
                ->leftJoin('users', 'profiles.user_id', '=', 'users.id')
                ->where('profiles.id', '=', $id)
                ->get();
        
        return $data;
    }
}
