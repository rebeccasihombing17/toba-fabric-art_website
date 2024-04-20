<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Your Preferred Font', Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(to right, #3498db, #2c3e50);
            color: #fff;
            padding: 20px;
            text-align: center;
            transition: background 0.3s ease;
            border-bottom: 2px solid #2980b9;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
            position: relative;
        }

        .container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #3498db, #2980b9);
            opacity: 0.15;
            z-index: -1;
        }

        .payment-details {
            padding: 40px;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        h1, h2, h3 {
            margin: 0;
            color: #333;
        }

        h1 {
            font-size: 2.5em;
        }

        h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #3498db;
        }

        h3 {
            color: #4caf50;
            font-size: 1.4em;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input, select {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 2px solid #3498db;
            border-radius: 6px;
            transition: border-color 0.3s ease;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 20px;
            font-size: 1em;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        p {
            margin-top: 20px;
            color: #666;
        }

        header:hover {
            background-color: #2980b9;
        }

        .container:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        input:hover, select:hover {
            border-color: #2980b9;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Pembayaran</h1>
    </header>

    <div class="container">
        <div class="payment-details">
            <h2>No.Rekening: 0123456710220</h2>
            @if($payment)
                <h3>Total Belanja: {{ $payment->amount ?? '- - -' }}</h3>
                <label for="nama">Jumlah Produk yang Dibeli: {{$payment->product_taken}}</label>
                <label for="nama">Alamat Lengkap: {{$payment->address}}</label>
                <label for="metode-pembayaran">Metode Pembayaran: {{$payment->payment_method}}</label>
                <label for="nama">Bukti Pembayaran: {{$payment->proof_of_payment}}</label>
                <div style="text-align: center;">
                    <a href="/"><button type="submit">Bayar</button></a>
                </div>
            @else
                <p>Produk tidak ditemukan.</p>
            @endif
        </div>
    </div>

</body>

</html>
