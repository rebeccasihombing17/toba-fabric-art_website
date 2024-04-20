<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #495057;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
            position: relative;
        }

        .payment-icon {
            font-size: 2em;
            margin-right: 10px;
        }

        header h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.5em;
            font-weight: 300;
        }

        .container {
            width: 60%;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .account-info,
        .info-section {
            text-align: center;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .account-info h2,
        .info-section h2 {
            margin-bottom: 10px;
            color: #007bff;
            font-size: 1.5em;
        }

        .account-info p,
        .info-section h2 i {
            font-size: 1.2em;
            color: #495057;
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #495057;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #f8f9fa;
            color: #495057;
        }

        select {
            appearance: none;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .purchase-banner {
            display: none;
            background-color: #28a745; /* Green color, you can change it */
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <header>
        <i class="far fa-credit-card payment-icon"></i>
        <h1>Pembayaran</h1>
        <p>Memudahkan proses pembelian dengan metode pembayaran yang modern.</p>
    </header>

    <div class="container">

        <div class="account-info">
            <h2><i class="fas fa-info-circle"></i> Informasi Akun</h2>
            <p><i class="fas fa-credit-card"></i> No. Rekening: 0123456710220</p>
        </div>

        <div class="info-section">
            @if($product)
                <h2><i class="fas fa-tags"></i> Harga Satuan Produk: {{ $product->product_price }}</h2>
            @endif
        </div>

        <form method="POST" action="{{ route('paymentadd', $product->code_product) }}" >
            @csrf
            <label for="product_taken">Jumlah Produk yang Dibeli:</label>
            <input type="number" id="product_taken" name="product_taken" required>
            
            <label for="buyer_name">Nama Penerima:</label>
            <input type="text" id="buyer_name" name="buyer_name" required>

            <label for="address">Alamat Lengkap:</label>
            <input type="text" id="address" name="address" required>

            <label for="payment_method">Metode Pembayaran:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="debit">Debit Card</option>
                <option value="credit">Credit Card</option>
            </select>

            <label for="proof_of_payment">Bukti Pembayaran (Teks):</label>
            <input type="text" id="proof_of_payment" name="proof_of_payment" required>

            <button type="submit" onclick="return confirm('Apakah Anda yakin telah melakukan pembelian ini?');">
                Konfirmasi
            </button>
        </form>
        <h6>Sistem pembayaran Toba Fabric Art:<br>
            <span style="color:red;">*</span>Nomor rekening untuk pembayaran telah disediakan<br>
            <span style="color:red;">*</span>Pembeli silahkan melakukan pembayaran produk melalui nomor rekening yang disediakan<br>
            <span style="color:red;">*</span>Setelah melakukan pembayaran, silahkan isi bukti pembayaran berupa kode transfer<br>
            <span style="color:red;">*</span>Ketika pelanggan telah mengkonfirmasi pembayaran, maka produk akan diproses oleh penjual<br>
        </h6>


    </div>

    <div id="purchase-banner" class="purchase-banner">
        <p>Terima kasih! Pembelian Anda berhasil.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to show the purchase banner
            function showPurchaseBanner() {
                var purchaseBanner = document.getElementById('purchase-banner');
                purchaseBanner.style.display = 'block';

                // You can add additional styling or animation here if needed
            }

            // Attach a click event listener to the submit button
            var submitButton = document.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.addEventListener('click', function () {
                    // You can add any logic here before showing the banner

                    // Show the purchase banner
                    showPurchaseBanner();
                });
            }
        });
    </script>
</body>
</html>
