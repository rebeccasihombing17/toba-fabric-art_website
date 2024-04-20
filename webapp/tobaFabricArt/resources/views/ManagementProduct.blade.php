<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Add Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add Google Fonts for a more attractive font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
            line-height: 1.6;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 28px;
        }

        .header-icon {
            margin-right: 10px;
        }

        #product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .product-container {
            width: 300px;
            margin: 20px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }

        .product-container:hover {
            transform: translateY(-5px);
        }

        .product-container img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .product-details {
            padding: 15px;
            text-align: center;
        }

        .product-options {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }

        .options-btn {
            padding: 8px 15px;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .options-btn:hover {
            background-color: #0056b3;
        }

        .buttons-container {
            text-align: center;
            margin-top: 20px;
        }

        #add-product-btn,
        #back-btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin: 0 10px;
        }

        #add-product-btn:hover,
        #back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <i class="header-icon fas fa-cube"></i>
    <h1 style="margin: 0;">Product List</h1>
</header>

<!-- Container to hold the product list -->
<div id="product-list"></div>

<!-- Buttons container -->
<div class="buttons-container">
    <!-- Button to add a new product -->
    <button id="add-product-btn" onclick="redirectToAddProduct()">Add Product</button>

    <!-- Button to go back -->
    <button id="back-btn" onclick="redirectToBack()">Back</button>
</div>

<!-- Include Font Awesome JavaScript (for icons) -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<script>
    // Sample product data
    const products = [
        @foreach ($product as $products)
            { name: '{{ $products->product_name }}',
              image: '{{asset('storage/' . $products->image_product)}}',
              id: '{{ $products->code_product }}'
            },
        @endforeach
    ];

    // Function to generate the product containers
    function generateProductContainers() {
        const productListContainer = document.getElementById('product-list');
        productListContainer.innerHTML = ''; // Clear previous content

        products.forEach((product, index) => {
            const productContainer = document.createElement('div');
            productContainer.classList.add('product-container');

            const productImage = document.createElement('img');
            productImage.src = product.image;

            const productDetails = document.createElement('div');
            productDetails.classList.add('product-details');
            productDetails.innerText = product.name;

            const productOptions = document.createElement('div');
            productOptions.classList.add('product-options');

            const editButton = createOptionsButton('edit', () => {
             window.location.href = `/editproduct/${product.id}`;
            });


            const deleteForm = document.createElement('form');
            deleteForm.method = 'POST';
            deleteForm.action = `/removeProduct/${product.id}`;
            deleteForm.innerHTML = `
                @csrf
                @method('DELETE')
            `;
            const deleteButton = createOptionsButton('Delete', () => deleteForm.submit());

            productOptions.appendChild(editButton);
            productOptions.appendChild(deleteForm);
            productOptions.appendChild(deleteButton);

            productContainer.appendChild(productImage);
            productContainer.appendChild(productDetails);
            productContainer.appendChild(productOptions);

            productListContainer.appendChild(productContainer);
        });
    }

    // Function to create an options button
    function createOptionsButton(text, clickHandler) {
        const button = document.createElement('button');
        button.classList.add('options-btn');
        button.innerText = text;
        button.addEventListener('click', clickHandler);
        return button;
    }

    // Function to redirect to AddProduct page
    function redirectToAddProduct() {
        window.location.href = '/addproduct';
    }

    // Function to redirect to the previous page
    function redirectToBack() {
        window.history.back();
    }

    // Generate the product containers on page load
    window.onload = generateProductContainers;
</script>

</body>
</html>
