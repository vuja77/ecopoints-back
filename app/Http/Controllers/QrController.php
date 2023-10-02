<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class QrController extends Controller
{
    public function generateQRCode()
{
    // Tekst koji želite da kodirate u QR kodu
   $text = ["points" => 30,"id" => "dk33"];
   $jsonData = json_encode($text);
    // Generisanje QR koda
    $qrCode = QrCode::size(300)->generate($jsonData);

    // Prosleđivanje $qrCode promenljive u Blade pogled
    return view('qrcode', compact('qrCode'));
}
}
