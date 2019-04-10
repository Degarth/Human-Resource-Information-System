<?php

namespace App\Imports;

use App\Attendance;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendancesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
            'employeeId' => $row[0],
            'fullname' => $row[1],
            'visited' => $row[2],
            'campus' => $row[3]
        ]);
    }
}
