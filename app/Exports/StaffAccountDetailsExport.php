<?php

namespace App\Exports;

use App\Models\StaffAccountDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StaffAccountDetailsExport implements FromView
{

    public function view(): View
    {
        return view('exports.export-staff-account-details');
    }
}
