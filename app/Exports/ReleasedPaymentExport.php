<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReleasedPaymentExport implements FromView
{
    public function view(): View
    {
        return view('exports.export-released-payment');
    }
}
