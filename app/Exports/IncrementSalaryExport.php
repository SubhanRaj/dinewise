<?php

namespace App\Exports;


use App\Models\IncrementSalaryModel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncrementSalaryExport implements FromView
{
    public function view(): View
    {
        return view('exports.export-increment-salary');
    }
}
