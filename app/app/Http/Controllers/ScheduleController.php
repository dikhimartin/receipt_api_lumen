<?php

namespace App\Http\Controllers;

use App\Transformer\ScheduleTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Repository\SchedulesRepository;
use App\Schedule;
use App\Question;

class ScheduleController extends Controller
{
    use Helpers;

    protected $scheduleRepository;
    protected $scheduleTransformer;

    public function __construct(SchedulesRepository $scheduleRepository, ScheduleTransformer $scheduleTransformer)
    {
        $this->scheduleRepository = $scheduleRepository;
        $this->scheduleTransformer = $scheduleTransformer;
    }
    // public function show(){
    //     $schedule = $this->scheduleRepository->getAll();

    //     $response = $this->response->item($schedule,new ScheduleTransformer());
    //     return $response;
    // }
    // public function view($id){
    //     $schedule = $this->scheduleRepository->getByid($id);

    //     $response = $this->response->item($schedule,new ScheduleTransformer());
    //     return $response;
    // }

    public function index(){
        $schedule = Schedule::all(); 

        $model    = new Schedule();
        $data     = $model->get_data();

        $result=array(
                "schedules"  => $data,
        );

        return response($result);
    }

    // public function index(){
    //     $schedule = Schedule::all();
    //     return response($schedule);
    // }

    // public function indexByStatus(){
    //     $schedule = Schedule::where(['status'=>1])->orderBy('start', 'desc')->get();
    //     return response($schedule);
    // }

    public function indexByStatus(){
        $schedule = Schedule::all(); 

        $model    = new Schedule();
        $data     = $model->get_data_status_1();

        $result=array(
                "schedules"  => $data,
        );

        return response($result);
    }

    // public function show($id){
    //     $schedule = Schedule::where('id',$id)->get();
    //     return response ($schedule);
    // }

    public function show($id){
        // $question = Question::where('id',$id)->get();
        // return response ($question);

        $model    = new Schedule();
        $data     = $model->getDataById($id);

        $result=array(
                "schedules"  => $data,
        );

        return response($result);
    }

    // public function create(){
    //     $schedule = $this->scheduleRepository->insertSchedule();

    //     $response = $this->response->item($schedule,new ScheduleTransformer());
    //     return $response;
    // }
    // public function logininfo(Request $request) {
    //     return $request->user();
    // }
    

    public function store (Request $request){
        $schedule = new Schedule();
        $schedule->title = $request->input('title');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        $schedule->durasi = $request->input('durasi');
        $schedule->category_id = $request->input('category_id');
        $schedule->level_id = $request->input('level_id');
        $schedule->jumlah_soal = $request->input('jumlah_soal');
        $schedule->status = 2;
        $schedule->save();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_SCHEDULES'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Tambah Data');
    }
    public function update(Request $request, $id){
        $schedule = Schedule::where('id',$id)->first();
        $schedule->title = $request->input('title');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        $schedule->durasi = $request->input('durasi');
        $schedule->category_id = $request->input('category_id');
        $schedule->level_id = $request->input('level_id');
        $schedule->jumlah_soal = $request->input('jumlah_soal');
        $schedule->status = 2;
        $schedule->save();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_SCHEDULES'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Merubah Data');
    }
    
    public function countSoal(Request $request){
        $question = Question::where(['level_id'=>$request->input('level_id'), 'category_id'=>$request->input('category_id')])->count();

        return response($question);
    }
    
    public function destroy($id){
        $schedule = Schedule::where('id',$id)->first();
        $schedule->delete();

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, env('SYNC_SCHEDULES'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);
    
        return response('Berhasil Menghapus Data');
    }
}