<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode()
    {
        // Replace 'https://example.com' with your desired URL or data
        $url = 'https://www.udcbd.net/';

        // Generate QR code as PNG image
        $qrCode = QrCode::size(300)->generate($url);

        // Return the QR code image as a response with the appropriate content type
        return response($qrCode, 200, ['Content-Type' => 'image/png']);
    }
}
