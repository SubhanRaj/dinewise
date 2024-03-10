<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AllInquiryExport implements FromView
{
    public $data;
    public function __construct($year, $month)
    {
        $this->data = ["year" => $year, "month" =>  $month];
    }
    public function view(): View
    {
        return view(
            'exports.export-all-inquiry',
            ['data' => $this->data]
        );
    }
}
