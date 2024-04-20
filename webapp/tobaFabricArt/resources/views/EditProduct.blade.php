<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toba Fabric Art</title>

    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            color: #495057; /* Dark gray text */
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #007bff; /* Blue header */
            color: #fff; /* White text */
            text-align: center;
            padding: 20px 0;
            font-size: 28px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White content background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .logo {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px; /* Adjust the margin as needed */
        }

        .logo img {
            max-height: 100px; /* Adjust the max height of the logo as needed */
        }

        .logo img,
        h1 {
            vertical-align: middle;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: auto;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #007bff; /* Blue border */
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Blue button color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff; /* White text */
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3; /* Lighter blue on hover */
        }

        .nav-item {
            margin-left: 2px; /* Adjusted margin for spacing */
        }

        .nav-link {
            color: #007bff; /* Blue link color */
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="/storage/logo.jpeg" alt="Toba Fabric Art">
            </div>

            <h1>Toba Fabric Art</h1>
        </header>

        <h1>Edit Product</h1>
        <form method="POST" action="{{ route('updateproduct', ['code_product' => $product->code_product]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}">

            <label for="product_price">Product Price:</label>
            <input type="number" name="product_price" id="product_price" value="{{ $product->product_price }}">

            <label for="product_description">Product Description:</label>
            <input type="text" name="product_description" id="product_description" value="{{ $product->product_description }}">

            <label for="stockt">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ $product->stock }}">

            <label for="image_product">Image Product:</label>
            <input type="file" name="image_product" id="image_product">

            <i class="nav-item ml-2">
                <span class="nav-link"> | </span>
            </i>

            <button type="submit" class="edit-button">Update</button>
        </form>
    </div>
</body>

