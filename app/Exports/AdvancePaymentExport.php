<?php

namespace App\Exports;

use App\Models\AdvancePaymentModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdvancePaymentExport implements FromView
{
    public $data;
    public function __construct($year, $month)
    {
        $this->data = ["year" => $year, "month" =>  $month];
    }
    public function view(): View
    {
        return view(
            'exports.export-advance-payment',
            [
                'data' => $this->data
            ]
        );
    }
}
