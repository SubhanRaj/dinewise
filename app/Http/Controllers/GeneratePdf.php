<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GeneratePdf extends Controller
{
    public function generatePdf(Request $request)
    {
        $order_id = "2023041";
        $pdf = Pdf::loadView('admin.pdf-bill',  compact('order_id'));
        $pdf->setOption(['defaultFont' => 'Courier']);
        $fileName = time() . mt_rand(100, 10000) . '.pdf';
        $pdf->save(public_path() . "/tempPdf/" . $fileName);
        $pdf = asset('tempPdf') . '/' . $fileName;
        return response()->json([
            'url' => $pdf,
            'filename' => $fileName
        ]);
    }
}
