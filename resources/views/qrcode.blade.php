<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>
    <h1>QR Code</h1>

    {{-- Prikazivanje QR koda koristeći Blade promenljivu $qrCode --}}
    <img src="{{ $qrCode }}" alt="QR Code">

    {{-- Dodatni tekst ili informacije ako je potrebno --}}
    <p>Scan the QR code above.</p>
</body>
</html>
