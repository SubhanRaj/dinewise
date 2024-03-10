<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class AttendanceExport implements FromView
{
    use Exportable;
    public $data;
    public function __construct($year, $month)
    {
        $this->data = ["year" => $year, "month" =>  $month];
    }
    public function view(): View
    {
        return view(
            'exports.export-attendance-data',
            ["data" => $this->data]
        );
    }
}
