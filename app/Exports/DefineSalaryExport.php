<?php

namespace App\Exports;

use App\Models\DefineSalaryModal;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DefineSalaryExport implements FromView
{
    public function view(): View
    {
        return view('exports.export-define-salary');
    }
}
