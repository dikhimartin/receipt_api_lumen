<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\UserSchedule;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class UserScheduleController extends Controller
{
    use Helpers;


    public function index(){
        // $user_schedule = UserSchedule::all(); 

        $model    = new UserSchedule();
        $data     = $model->get_data();

        $result=array(
                "user_schedules"  => $data,
        );

        return response($result);
    }

    public function indexAll(){
        // $user_schedule = UserSchedule::all(); 

        $model    = new UserSchedule();
        $data     = $model->get_data_all();

        $result=array(
                "user_schedules"  => $data,
        );

        return response($result);
    }
    
    public function indexAllId($id){
        // $user_schedule = UserSchedule::all(); 

        $model    = new UserSchedule();
        $data     = $model->get_data_all_id($id);

        $result=array(
                "user_schedules"  => $data,
        );

        return response($result);
    }
    
    public function show($id){

        $model    = new UserSchedule();
        $data     = $model->getDataById($id);

        $result=array(
                "user_schedules"  => $data,
        );

        return response($result);
    }


    public function detail($id){

        $model    = new UserSchedule();
        $data     = $model->getDetail($id);

        $result=array(
                "user_schedules"  => $data,
        );

        return response($result);
    }

    


    // public function store (Request $request){

    //     $schedule_id = $request->input('schedule_id');
    //     $user_id     = $request->input('user_id');

        
    //     foreach($user_id as $key => $value) {
            
    
            
    //         $count = UserSchedule::where('user_id',$value)->where('schedule_id',$request->input('schedule_id'))->count();
        
    //         if($count){
            
    //             return response("Peserta sudah pernah ditambahkan");
            
    //         } else {
    //             $user_schedule  = new UserSchedule();
    //             $user_schedule->user_id     = $value;
    //             $user_schedule->schedule_id = $request->input('schedule_id');
    //             $user_schedule->save();

    //         }

    //     }

        
    //     return response('Berhasil Tambah Data');
    // }


    public function store (Request $request){

        $user_schedule  = new UserSchedule();

        $user_schedule->user_id = $request->input('user_id');
        $user_schedule->schedule_id = $request->input('schedule_id');
        
        $user_schedule->save();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_SCHEDULES'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Tambah Data');
    }

    public function cekUnique(Request $request){
        
        $cek = UserSchedule::select('user_id')->where('user_id',$request->user_id)->where('schedule_id',$request->schedule_id)->first();
        
        if($cek != null) {
            $cek = false;
        } else {
            $cek = true;
        }
        return response()->json([
            'message'  => $cek,
        ]);
    }

    public function update (Request $request){

        $user_schedule = UserSchedule::where('id',$id)->first();    

        $user_schedule->user_id = $request->input('user_id');
        $user_schedule->schedule_id = $request->input('schedule_id');
        
        $user_schedule->save();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_SCHEDULES'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Merubah Data');
    }

    
    // public function update(Request $request, $id){
        
    //     $user_schedule = UserSchedule::where('id',$id)->first();    
        
    //     $count = UserSchedule::where('user_id',$request->input('user_id'))->where('schedule_id',$request->input('schedule_id'))->count();
        
    //     if($count){
            
    //         return response("Peserta sudah pernah ditambahkan");
            
    //     } else {

    //         $user_schedule->user_id = $request->input('user_id');
    //         $user_schedule->schedule_id = $request->input('schedule_id');

    //         $user_schedule->save();
        
    //     }
        
    //     return response('Berhasil Merubah Data');
    // }

    
    public function destroy($id){
        $user_schedule = UserSchedule::where('id',$id)->first();
        $user_schedule->delete();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_SCHEDULES'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Menghapus Data');
    }
}