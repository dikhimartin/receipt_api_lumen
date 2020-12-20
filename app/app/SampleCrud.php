<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SampleCrud extends Model{
    
    protected $table 		= 'sample_crud';
    protected $primaryKey 	= 'id';

    public $incrementing = true;
    public $timestamps   = true;

    protected $fillable = ['id','name', 'description','status', 'created_by', 'updated_by',  'created_at', 'updated_at', 'additional'];

    public function get_data(){
    	$data = DB::table('sample_crud')
        ->select('sample_crud.*')
        ->orderBy('id','ASC');
        return $data;
    }

}