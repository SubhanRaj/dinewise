<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuccessfullInquiryExport implements FromView
{
    public function view(): View
    {
        return view('exports.export-successfull-inquiry');
    }
}
