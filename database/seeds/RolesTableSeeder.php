<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//DB::table('roles')->delete();
        DB::table('roles')->insert([
        	['id' => '0', 'name' => 'admin'],
        	['id' => '1', 'name' => 'sinhvien'],
        	['id' => '2', 'name' => 'giaovien'],
        ]);
    }
}
