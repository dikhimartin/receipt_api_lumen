<?php

namespace App\Repository;

use App\User;

class UsersRepository
{
    public function getAll(){
        $users = User::all();
        //$users = User::where(['role'=>'admin'])->get();
        return $users;
    }

    public function getAllPengguna(){
        // $users = User::all();
        $users = User::where(['role'=>'admin'])->get();
        return $users;
    }

    public function getAllPeserta(){
        // $users = User::all();
        $users = User::where(['role'=>'user'])->get();
        return $users;
    }

    public function getByid($id){
        $users = User::find($id);
        return $users;
    }
    public function insertUser($input){
        $user = new User();
        $user->fullname= $input['fullname'];
        $user->email= $input['email'];
        $user->password= Hash::make($input['password']);
        $user->city= $input['city'];
        $user->status= $input['status'];
        $user->status= $input['role'];
        $user->save();
    }
    public function updateUser($id,$input){
        $user = new User();
        $user->fullname= $input['fullname'];
        $user->email= $input['email'];
        $user->password= Hash::make($input['password']);
        $user->city= $input['city'];
        $user->status= $input['status'];
        $user->status= $input['role'];
        $user->save();
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
    }

}