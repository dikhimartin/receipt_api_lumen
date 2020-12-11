<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OauthClientTableSeeder::class);
        $this->call(OauthPersonalAccessClientsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
