<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileEducation extends Model
{
    protected $fillable = [
        'profile_id',
        'school_name',
        'prodi_name',
        'jenjang',
        'nilai',
        'year_start',
        'year_end',
        'school_address',
        'description'            
    ];

    protected $hidden   = ['created_at', 'updated_at'];
}
