<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run(){
  		DB::table('users')->insert([
            'id'           => 1,
            'fullname'     => "Superadmin",
            'email'        => "superadmin@gmail.com",
            'password'     => Hash::make('superadmin'),
            'city'         => "Jakarta",
            'status'       => 1,
            'role'         => "admin",
        ]);    
  	}
}
