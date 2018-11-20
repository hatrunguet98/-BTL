<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {	
    	try {
        	$this->call(UsersTableSeeder::class);
    	} catch (Exception $e) {

    	}

    	try {
    		$this->call(RolesTableSeeder::class);
    	} catch (Exception $e) {
    		
    	}
    }
}
