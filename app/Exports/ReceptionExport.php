<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ReceptionExport implements FromView
{
    public $data;
    public function __construct($year, $month)
    {
        $this->data = ["year" => $year, "month" =>  $month];
    }
    public function view(): View
    {
        return view('exports.export-reception', [
            'data' => $this->data
        ]);
    }
}
