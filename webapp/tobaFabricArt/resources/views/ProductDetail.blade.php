<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product Toba Fabric Art</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="path/to/your/font.css">

    <style>
        body {
            font-family: 'Your Preferred Font', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .logo {
            text-align: center;
            margin-top: 20px;
        }

        .logo img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #3498db;
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        header {
            height: 80px;
            text-align: center;
            padding: 20px;
            background-size: cover;
            color: #3498db;
            font-size: 36px;
            font-weight: bold;
            background: linear-gradient(to right, #3498db, #2c3e50);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        .product-container-main {
            padding: 40px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 20px auto;
            background-color: #fff;
            max-width: 600px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .product-image-main img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 15px;
            border: 2px solid #3498db;
        }

        .product-details-main {
            margin-top: 30px;
            text-align: center;
            line-height: 1.8;
        }

        .product-name-main {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .product-description-main {
            color: #555;
            margin-bottom: 20px;
        }

        .product-price-main {
            font-size: 28px;
            color: #3498db;
            margin-bottom: 20px;
        }

        .btn-buy-main,
        .addToWishList {
            padding: 15px 29px;
            font-size: 19px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease, color 0.3s ease;
            display: inline-block;
            margin-right: 10px;
            background: #3498db;
            color: #fff;
        }

        .addToWishList {
            margin-right: 0;
        }

        .btn-buy-main:hover,
        .addToWishList:hover {
            transform: scale(1.05);
            background: #2980b9;
        }
    </style>
</head>

<body>

    <div class="logo">
        <img src="/storage/logo.jpeg" alt="Toba Fabric Art">
    </div>

    <header>
        Toba Fabric Art
    </header>

    <div class="product-container-main">
        @if($product)
        <div class="product-item">
            <div class="product-image-main">
                <img src="{{ asset('storage/' . $product->image_product) }}" alt="{{ $product->product_name }}">
            </div>
            <div class="product-details-main">
                <div class="product-name-main">{{ $product->product_name }}</div>
                <div class="product-description-main">{{ $product->product_description }}</div>
                <div class="product-price-main">Rp {{ $product->product_price }}</div>

                @if(auth()->check() && auth()->user()->status == 'pembeli')
                <a href="/Payment/{{$product->code_product}}">
                    <button class="btn-buy-main"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                </a>
                <form method="POST" action="{{ route('postwish', $product-> code_product) }}">
                    @csrf
                    <button class="addToWishList"><i class="fas fa-heart"></i> Wishlist</button>
                </form>
                @endif
            </div>
        </div>
        @else
        <p>Produk tidak ditemukan.</p>
        @endif
    </div>
</body>

</html>
