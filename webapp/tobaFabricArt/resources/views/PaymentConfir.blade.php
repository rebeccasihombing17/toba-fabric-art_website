<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff; /* Blue background */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 70%;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            position: relative;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .container:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid #3498db;
            border-radius: 12px;
            z-index: -1;
        }

        .container:hover {
            transform: translateY(-10px);
        }

        .info-column {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        label {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            color: #333; /* Dark text color */
            font-weight: bold;
            font-size: 16px;
        }

        .highlight-label {
            color: #007bff; /* Blue label color */
            margin-right: 8px;
        }

        .highlight-label i {
            margin-right: 4px; /* Adjust the spacing between icon and text */
        }

        .info-column span {
            margin-bottom: 12px;
            color: #555; /* Subdued text color */
        }

        form {
            margin-bottom: 30px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #bbb;
            border-radius: 6px;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus,
        select:focus {
            border-color: #3498db; /* Blue border on focus */
        }

        button {
            background-color: #007bff; /* Blue button color */
            color: white;
            padding: 18px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
            font-size: 18px;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <header>
        <h1>Payment Confirmation</h1>
    </header>

    <div class="container">
    @foreach($payments as $payment) 
        <form>
        <div class="info-column">
            <label for="name-product" class="highlight-label"><i class="fas fa-shopping-cart"></i> Product Name:</label>
            <span>{{ $payment->product->product_name }}</span>
        </div>

        <div class="info-column">
            <label for="nama-penerima" class="highlight-label"><i class="fas fa-user"></i> Recipient Name:</label>
            <span>{{$payment-> buyer_name}}</span>
        </div>

        <div class="info-column">
            <label for="jumlah-produk" class="highlight-label"><i class="fas fa-shopping-basket"></i> Quantity Purchased:</label>
            <span>{{$payment-> product_taken}}</span>
        </div>

        <div class="info-column">
            <label for="harga" class="highlight-label"><i class="fas fa-dollar-sign"></i> Price:</label>
            <span>{{$payment-> amount}}</span>
        </div>

        <div class="info-column">
            <label for="alamat" class="highlight-label"><i class="fas fa-map-marker-alt"></i> Full Address:</label>
            <span>{{$payment-> address}}</span>
        </div>

        <div class="info-column">
            <label for="metode-pembayaran" class="highlight-label"><i class="fas fa-credit-card"></i> Payment Method:</label>
            <span>{{$payment-> payment_method}}</span>
        </div>

        <label for="bukti-pembayaran">Bukti Pembayaran:{{$payment-> proof_of_payment}}</label>
    </form>
    @endforeach
            
    {{-- Check if the user is a "pembeli" --}}
        @if(auth()->check() && auth()->user()->status == 'pembeli')
            <a href="/"><button type="submit">Confirm</button></a>
        @else
            <a href="{{ route('seller') }}"><button type="submit">Confirm</button></a>
        @endif

    </div>

</body>

</html>
