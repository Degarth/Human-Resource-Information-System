<?php

namespace App\Imports;

use App\Attendance;
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
            'employeeId' => $row[1],
            'fullname' => $row[2],
            'visited' => $row[3],
            'campus' => $row[4]
        ]);
    }
}
