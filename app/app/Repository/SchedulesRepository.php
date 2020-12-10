<?php

namespace App\Repository;

use App\Schedule;

class SchedulesRepository
{
    public function getAll(){
        $schedules = Schedule::all();
        return $schedules;
    }

    public function getByid($id){
        $schedules = Schedule::find($id);
        return $schedules;
    }
    // public function insertSchedule($input){
    //     $schedule = new Schedule();
    //     $schedule->title= $input['title'];
    //     $schedule->start= $input['start'];
    //     $schedule->end= $input['end'];
    //     $schedule->save();
    // }
    // public function updateUser($id,$input){
    //     $user = new User();
    //     $user->fullname= $input['fullname'];
    //     $user->email= $input['email'];
    //     $user->password= Hash::make($input['password']);
    //     $user->city= $input['city'];
    //     $user->status= $input['status'];
    //     $user->save();
    // }
    // public function deleteUser($id){
    //     $user = User::find($id);
    //     $user->delete();
    // }

}