<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class WorksheetExport implements FromView
{
    public $data;
    public function __construct($year, $month)
    {
        $this->data = ["year" => $year, "month" =>  $month];
    }
    public function view(): View
    {
        return view('exports.export-worksheet', [
            'data' => $this->data
        ]);
    }
}
