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

    		$this->call(RolesTableSeeder::class);
        try {
    	} catch (Exception $e) {
    		
    	}
        try {
        } catch (Exception $e) {
            
        }
    }
}
