<?php

use Illuminate\Database\Seeder;

class OauthPersonalAccessClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
    	DB::table('oauth_personal_access_clients')->insert([
            'id'        			       => 1,
            'client_id'        			   => 1,
        ]);

    }
}
