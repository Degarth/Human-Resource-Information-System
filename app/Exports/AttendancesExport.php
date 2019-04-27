<?php

namespace App\Exports;

use App\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendancesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Employee Id',
            'Full name',
            'Date Checked',
            'Campus',
            'From',
            'To',
            'Created at',
            'Updated at'
        ];
    }
}
