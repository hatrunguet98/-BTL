<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Http\Controllers\Auth\StudentRegisterController;
use Illuminate\Support\Facades\Hash;

class TeacherRegister implements ToCollection
{
    protected $role = 2;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $datas = $rows;
        $array = array();
        $count = 0;
        foreach ($datas as $data) {
            $arr = array();
            if($data[0] == null) {
                break;
            } else {
                foreach ( $data as $dat) {
                    if($dat != null && $count > 0) {
                        $arr[] = $dat;
                    }
                }
            }
            if( $arr != null) {
                //$arr[0] = (int)$arr[0];
                //$a = trim($arr[1],$arr[1][0]);
                $arr[1] = preg_replace('/[^A-Za-z0-9\-\_]/', '', $arr[1]);
                $arr[2] = preg_replace('/[^A-Za-z0-9\-\_]/', '', $arr[2]);
                if($arr[4][0] == "=") {
                    $arr[4] = $arr[1] . "@vnu.edu.vn";
                }

                //$arr[3] = substr($arr[3], 1,1);

                $array[] = $arr;
            }
            $count++;
        }
        foreach ($array as $data) {
            try {
                User::create([
                    'username' => $data[1],
                    'name' => $data[3],
                    'email' => $data[4],
                    'password' => Hash::make($data[2]),
                    'role' => $this->role,
                ]);
            } catch( \Exception $e ) {

            }
        }
        return $array;
    }
}
