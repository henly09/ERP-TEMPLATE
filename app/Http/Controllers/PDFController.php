<?php

namespace App\Http\Controllers;

use App\Models\Vouchreqs;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function generatePDF()

    {
        $vouchreqs = Vouchreqs::get();

        $data = [

            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'vouchreqs' => $vouchreqs

        ]; 

        $pdf = PDF::loadView('pages.pdfTemplates.PDFgen1', $data);

        $currentDate = Carbon::now();

        return $pdf->download($currentDate->format('Ymd').'_'.'PDFGen1'.'.pdf');
    }
}
