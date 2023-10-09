<?php

namespace App\Http\Controllers;

use App\Models\Vouchreqs;
use App\Models\Customers;
use Illuminate\Http\Request;
use PDF;
use Response;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function generatePDFVoucherRequest($id){

        $vouchreqs = Vouchreqs::find($id);
        $customers = Customers::where('id', $vouchreqs->cust_id)->first();
        $amountword = $this->numberToWords($vouchreqs->amount);
        
        $imageUrl = public_path('images/dahlia.png');
        $imageData = File::get($imageUrl);
        $base64Image = 'data:image/png;base64,' . base64_encode($imageData);

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'vouchreqs' => $vouchreqs,
            'customers' => $customers,
            'amountword' => $amountword,
            'base64Image' => $base64Image
        ]; 

        $pdf = PDF::loadView('pages.pdfTemplates.PDFVouchPrint', $data);

        $customHeight = 200; // Adjust the height as per your requirements
        $pdf->getDomPDF()->set_paper('a4', 'portrait', $customHeight);

        // Optionally, you can set margins to maximize the content area
        $pdf->setOption('margin-top', 10); // Adjust the top margin
        $pdf->setOption('margin-bottom', 10); // Adjust the bottom margin
    
        // Set the paper size to landscape mode (optional if you want a landscape PDF)
        $pdf->setPaper('L');
    
        // Render the PDF
        $pdf->output();
    
        // Get the canvas and page dimensions
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
    
        // Set the opacity of the watermark
        $canvas->set_opacity(0.1, "Multiply");
    
        // Add watermark using the "page_text" method from the underlying dompdf
        $font = $pdf->getDomPDF()->getFontMetrics()->getFont('Helvetica', 'Bold');
        $text = 'Dahlia Customs Brokerage';
    
        $fontSize = 60;
        $angle = -52; // Rotate the watermark counterclockwise by 30 degrees
    
        // Add the watermark
        $canvas->page_text(85,600, $text, $font, $fontSize, array(0, 0, 0), 1, 1, $angle);
        $currentDate = Carbon::now();
        return $pdf->download($currentDate->format('Ymd') . '_' . 'PDFGen1' . '.pdf');
    }

    public function genLaraview($id){

        $vouchreqs = Vouchreqs::find($id);
        $customers = Customers::where('id', $vouchreqs->cust_id)->first();
        $amountword = $this->numberToWords($vouchreqs->amount);
        
        $imageUrl = public_path('images/dahlia.png');
        $imageData = File::get($imageUrl);
        $base64Image = 'data:image/png;base64,' . base64_encode($imageData);

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'vouchreqs' => $vouchreqs,
            'customers' => $customers,
            'amountword' => $amountword,
            'base64Image' => $base64Image
        ]; 

        $pdf = PDF::loadView('pages.pdfTemplates.PDFVouchPrint', $data);

        $customHeight = 200; // Adjust the height as per your requirements
        $pdf->getDomPDF()->set_paper('a4', 'portrait', $customHeight);

        // Optionally, you can set margins to maximize the content area
        $pdf->setOption('margin-top', 10); // Adjust the top margin
        $pdf->setOption('margin-bottom', 10); // Adjust the bottom margin
    
        // Set the paper size to landscape mode (optional if you want a landscape PDF)
        $pdf->setPaper('L');
    
        // Render the PDF
        $pdf->output();
    
        // Get the canvas and page dimensions
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
    
        // Set the opacity of the watermark
        $canvas->set_opacity(0.1, "Multiply");
    
        // Add watermark using the "page_text" method from the underlying dompdf
        $font = $pdf->getDomPDF()->getFontMetrics()->getFont('Helvetica', 'Bold');
        $text = 'Dahlia Customs Brokerage';
    
        $fontSize = 60;
        $angle = -52; // Rotate the watermark counterclockwise by 30 degrees
    
        // Add the watermark
        $canvas->page_text(85,600, $text, $font, $fontSize, array(0, 0, 0), 1, 1, $angle);
        $currentDate = Carbon::now();
        return $pdf->stream($currentDate->format('Ymd') . '_' . 'PDFGen1' . '.pdf');
    }

    public function numberToWords($number) {
        $words = array(
            'zero', 'one', 'two', 'three', 'four',
            'five', 'six', 'seven', 'eight', 'nine',
            'ten', 'eleven', 'twelve', 'thirteen', 'fourteen',
            'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
    
        $tens = array(
            '', '', 'twenty', 'thirty', 'forty',
            'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
        );
    
        $suffixes = array(
            '', 'thousand', 'million', 'billion', 'trillion'
        );
    
        $number = number_format($number, 2, '.', '');
        $number_parts = explode('.', $number);
        $whole_number = (int) $number_parts[0];
        $decimal = (int) $number_parts[1];
    
        if ($whole_number == 0) {
            return "zero Pesos";
        }
    
        $output = "";
        $chunk_count = 0;
    
        while ($whole_number > 0) {
            $chunk = $whole_number % 1000;
            if ($chunk != 0) {
                $hundreds = floor($chunk / 100);
                $tens_units = $chunk % 100;
    
                $chunk_words = array();
    
                if ($hundreds > 0) {
                    $chunk_words[] = $words[$hundreds] . ' hundred';
                }
    
                if ($tens_units > 0) {
                    if ($tens_units < 20) {
                        $chunk_words[] = $words[$tens_units];
                    } else {
                        $tens_digit = floor($tens_units / 10);
                        $units_digit = $tens_units % 10;
                        $chunk_words[] = $tens[$tens_digit];
                        if ($units_digit > 0) {
                            $chunk_words[] = $words[$units_digit];
                        }
                    }
                }
    
                if ($chunk_count > 0) {
                    $chunk_words[] = $suffixes[$chunk_count];
                }
    
                $output = implode(' ', $chunk_words) . ' ' . $output;
            }
    
            $whole_number = floor($whole_number / 1000);
            $chunk_count++;
        }
    
        $output = ucfirst(trim($output));
        $output .= ($decimal > 0) ? " and $decimal/100 Pesos" : " Pesos";
    
        return $output;
    }
}
