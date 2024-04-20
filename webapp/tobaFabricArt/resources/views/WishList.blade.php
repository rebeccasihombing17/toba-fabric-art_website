<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Your Preferred Font', Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #495057;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .my-4 {
            margin-top: 40px;
            margin-bottom: 40px;
            text-align: center;
            color: white;
        }

        .my-10 {
            margin-top: 40px;
            margin-bottom: 40px;
            color: white;
            text-align: center;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ced4da;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #fff;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #343a40;
        }

        .card-text {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .quantity {
            margin-bottom: 10px;
            font-size: 14px;
            color: #495057;
        }

        .remove-button {
            cursor: pointer;
            background-color: #007bff; /* Blue color */
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .remove-button:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }


        header {
            background: linear-gradient(to right, #3498db, #2c3e50);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        nav {
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .love-icon {
            font-size: 24px;
            margin-right: 5px;
            color: red;
        }

        .duck {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 40px;
            animation: moveDuck 2s infinite alternate;
        }

        @keyframes moveDuck {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(20px);
            }
        }

        .selesai-button {
            margin-top: 20px;
            background: linear-gradient(to right, #007bff, #004080);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .selesai-button:hover {
            background: linear-gradient(to right, #0056b3, #003366);
        }
    </style>
</head>

<body>
    <header>
        <h1 class="my-10">Toba Fabric Art</h1>
        <h1 class="my-4">My Wishlist</h1>
        <span class="love-icon">&#10084;</span>
        <nav>
            <a href="/">Dashboard</a>
        </nav>
    </header>
    <div class="duck">&#129415;</div>
    <div class="container">
        <div class="row" id="wishlist-container">
            @foreach($wishlists as $products)
                <div class="card">
                    <img src="{{asset('storage/' . $products->image_product)}}" class="card-img-top" alt="{{ $products->product_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $products->product_name  }}</h5>
                        <p class="card-text">{{ $products->description }}</p>
                        <p class="card-text">Price: Rp {{ $products->product_price }}</p>
                        <p class="quantity">Quantity: {{ $products->quantity }}</p>
                        <form method="POST" action="{{ route('removeWish', $products->code_wish) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-button">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="text-align: center;">
            <a href="/">
                <button type="submit" class="selesai-button">
                    Selesai
                </button>
            </a>
        </div>
    </div>
</body>

</html>
