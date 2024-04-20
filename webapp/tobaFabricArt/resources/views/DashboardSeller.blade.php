<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="path/to/your/font.css">
    <style>
        body {
            font-family: 'Your Preferred Font', Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        header {
            background: linear-gradient(to right, #3498db, #2c3e50);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo a {
            text-decoration: none;
            color: #fff;
        }

        .logo img {
            height: 80px;
            border-radius: 50%;
        }

        .search {
            flex: 1;
            display: flex;
            margin: 0 20px;
        }

        .search input[type="text"] {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 25px;
            outline: none;
            font-size: 15px;
            margin-right: 10px;
        }

        .search button {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            position: relative;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #f0f0f0;
        }

        nav a:hover::after {
            content: '';
            display: block;
            background-color: #fff;
            height: 2px;
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product {
            position: relative;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product h3,
        .product p {
            margin: 10px 0;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        
        .btn-primary {
            width: 48%;
            padding: 10px;
            border-radius: 5px;
        }

        .product button,
        .product a.btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            display: block;
            font-size: 15px;
            width: 100%;
            margin-top: 0;
        }

        .product button:hover,
        .product a.btn-primary:hover {
            background-color: #0056b3;
        }

        .product a.btn-primary {
            margin-left: 10px;
        }

        .product button i,
        .product a.btn-primary i {
            margin-right: 5px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f0f0f0;
        }

        footer ul {
            list-style-type: none;
            padding: 0;
        }

        footer li {
            display: inline;
            margin: 0 10px;
        }

        footer a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="/">
                    <img src="storage/logo.jpeg" alt="Toba Fabric Art">
                </a>
            </div>
            <div class="search">
                <input type="text" id="searchInput" placeholder="Cari produk...">
                <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
            </div>
            <nav>
                @if(auth()->check())
                    <a href="#">Hi {{ auth()->user()->full_name }}</a>

                    @if(auth()->user()->status == 'penjual')
                        <a href="/ManagementProduct">Management Product</a>
                        <a href="{{route('confirmation')}}">Payment Confirmation</a>
                    @endif

                    <a href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>

                @else
                    <a href="/login">Log in</a>
                    <span>/</span>
                    <a href="/register">Register</a>
                @endif
            </nav>
        </header>

        <div id="product-list-container" class="product-list">
            @foreach ($product as $products)
                <div class="product">
                    <img src="{{asset('storage/'.$products->image_product)}}" alt="{{ $products->product_name }}">
                    <h3>{{ $products->product_name }}</h3>
                    <p>Harga : Rp {{ $products->product_price }}</p>
                    <p>Stock : {{ $products->stock }} items</p>
                    <div class="button-container">
                        <a href="/productdetail/{{$products->code_product}}" class="btn btn-primary">
                            <i class="fas fa-eye"></i> View More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

<footer style="background: linear-gradient(to right, #3498db, #2c3e50);">
    <ul style="text-align: center;">
        <li><a href="/AboutWe/" style="text-decoration: none; color: #fff;">Tentang Kami</a></li>
        <li><a href="/Syarat/" style="text-decoration: none; color: #fff;">Syarat & Ketentuan</a></li>
    </ul>
    <div style="margin-top: 20px;">
        <p>&copy; 2023 Toba Fabric Art. All rights reserved.</p>
    </div>
</footer>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function searchProducts() {
            var searchInput = document.getElementById("searchInput").value.toLowerCase();

            // Filter products based on search input
            var filteredProducts = {!! json_encode($product) !!}.filter(function(product) {
                return product.product_name.toLowerCase().includes(searchInput);
            });

            // Update the product list with filtered results
            updateProductList(filteredProducts);
        }

        function updateProductList(products) {
            var productListContainer = document.getElementById("product-list-container");
            var notFoundMessage = document.getElementById("not-found-message");

            // Clear existing content
            productListContainer.innerHTML = "";

            if (products.length > 0) {
                // Display each product in the updated product list
                products.forEach(product => {
                    var productElement = createProductElement(product);
                    productListContainer.appendChild(productElement);
                });

                // Hide the "Product is not found" message
                notFoundMessage.style.display = "none";
            } else {
                // Display the "Product is not found" message
                notFoundMessage.style.display = "block";
            }
        }

        function createProductElement(product) {
            // Create a product element based on your existing structure
            var productElement = document.createElement("div");
            productElement.classList.add("product");

            // Set inner HTML content for the product element
            productElement.innerHTML = `
                <img src="{{ asset('storage/') }}/${product.image_product}" alt="${product.product_name}">
                <h3>${product.product_name}</h3>
                <p>Harga : Rp ${product.product_price}</p>
                <p>Stock : ${product.stock} items</p>
                <div class="button-container">
                    <a href="/productdetail/${product.code_product}" class="btn btn-primary">
                        <i class="fas fa-eye"></i> View More
                    </a>
                </div>
            `;

            return productElement;
        }
    </script>
</body>



</html>
