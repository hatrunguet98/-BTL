<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CourseListStudent implements ToCollection
{
    public function collection(Collection $rows)
    {
    	$datas = array();
    	$i=0;
    	$code = $rows[8][2];
        foreach ($rows as $key => $row) {
        	$i++;
        	if(is_numeric($row[0])){
        		$datas[] = preg_replace('/[^A-Za-z0-9\-\_]/', '', $row[1]);
        	}
        }
        $check = DB::table('courses')->where('code', $code)->first();
        if($check){
        $course_id = $check->id;
            foreach ($datas as $key => $data) {
                $user = DB::table('users')
                    ->where('username', $data)
                    ->where('status', '1')
                    ->first();
                if($user){
                    $user_id = $user->id;
                    $temp = DB::table('user_courses')
                        ->where('user_id', $user_id)
                        ->where('course_id', $course_id)
                        ->first();
                    if(!$temp){
                        DB::table('user_courses')->insert([
                            'course_id' => $course_id,
                            'user_id' => $user_id,
                        ]);
                    }
                }
            }
        }
      	return $datas;
    }
}
