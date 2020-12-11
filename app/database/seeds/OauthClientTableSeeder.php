<?php

use Illuminate\Database\Seeder;

class OauthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    	DB::table('oauth_clients')->insert([
            'id'        			   => 1,
            'name'      			   => "Personal Access Client",
            'secret'    			   => "XVjajgiLbnE4jRQWzi8KvcNYVswsLcAkAucn3T7H",
            'redirect'  			   => "http://localhost",
            'personal_access_client'   => true,
            'password_client'  		   => false,
            'revoked'  		   		   => false,
        ]);

 		DB::table('oauth_clients')->insert([
            'id'        			   => 2,
            'name'      			   => "Password Grant Client",
            'secret'    			   => "gsiw50XQoJvWDCv3lWsXVTSh0mdyUaa450TWWVbo",
            'redirect'  			   => "http://localhost",
            'personal_access_client'   => false,
            'password_client'  		   => true,
            'revoked'  		   		   => false,
        ]);


    }
}
