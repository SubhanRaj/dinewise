<?php

namespace App\Exports;

use App\Models\StaffModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return StaffModel::select('uid', 'name', 'email', 'phone', 'work_ex', 'designation', 'doj', 'address', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return  ['uid', 'name', 'email', 'phone', 'work_ex', 'designation', 'doj', 'address', 'created at', 'updated at'];
    }
}
