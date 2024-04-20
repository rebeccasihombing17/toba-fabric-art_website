<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background: linear-gradient(to right, #007bff, #0056b3), url('your-background-image.jpg') center/cover no-repeat;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            position: relative;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .header-icon {
            font-size: 36px;
            margin-right: 10px;
        }

        header h1 {
            font-size: 24px;
            margin: 0;
            font-weight: 700;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #e0e0e0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }

        label, p {
            margin-bottom: 8px;
            font-weight: 400;
        }

        .info-container {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .info-icon {
            font-size: 24px;
            margin-right: 10px;
            color: #007bff;
        }

        .info-label {
            font-size: 16px;
            font-weight: 700;
            color: #000;
            margin-bottom: 5px;
        }

        .info-container .info-value {
            font-size: 14px;
            color: #333;
        }

        button {
            background: linear-gradient(to right, #007bff, #004080);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #004080, #001f40);
            transform: scale(1.05);
        }

        /* Additional Styles for Improved Visibility */
        h1 {
            color: #ffffff;
            font-size: 36px;
            margin: 10px 0;
        }

        .container p {
            font-size: 16px;
        }
    </style>
</head>
<body>

    <header>
        <div class="header-content">
            <div class="logo-container">
                <i class="fas fa-shopping-bag header-icon"></i>
                <h1>Riwayat Pembelian</h1>
            </div>
        </div>
    </header>

    <div class="container">
        @foreach($payments as $payment)
        <form>
            <div class="info-container">
                <i class="fas fa-box info-icon"></i>
                <div>
                    <p class="info-label">Nama Produk:</p>
                    <p class="info-value">{{ $payment->product->product_name }}</p>
                </div>
            </div>

            <div class="info-container">
                <i class="fas fa-shopping-cart info-icon"></i>
                <div>
                    <p class="info-label">Jumlah Produk yang Dibeli:</p>
                    <p class="info-value">{{$payment-> product_taken}}</p>
                </div>
            </div>

            <div class="info-container">
                <i class="fas fa-map-marker-alt info-icon"></i>
                <div>
                    <p class="info-label">Alamat Lengkap:</p>
                    <p class="info-value">{{$payment-> address}}</p>
                </div>
            </div>

            <div class="info-container">
                <i class="fas fa-credit-card info-icon"></i>
                <div>
                    <p class="info-label">Metode Pembayaran:</p>
                    <p class="info-value">{{$payment-> payment_method}}</p>
                </div>
            </div>

            <div class="info-container">
                <i class="fas fa-receipt info-icon"></i>
                <div>
                    <p class="info-label">Bukti Pembayaran:</p>
                    <p class="info-value">{{$payment-> proof_of_payment}}</p>
                </div>
            </div>
        </form>
        @endforeach
        <a href="/"><button type="submit">Selesai</button></a>
    </div>
</body>
</html>
