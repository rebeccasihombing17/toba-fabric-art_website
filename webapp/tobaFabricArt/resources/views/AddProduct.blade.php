<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toba Fabric Art</title>

    <style>
        .header {
            height: 100px;
            text-align: center;
            padding: 20px;
            background-size: cover;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        body {
            background-color: #fff; /* Red background */
            color: black; /* White text */
            font-family: Arial, sans-serif; /* Font */
            padding: 20px; /* Padding for content */
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
            border: ; /* White border */
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Updated button color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff; /* White text */
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3; /* Lighter blue on hover */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
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
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="storage/logo.jpeg" alt="Toba Fabric Art">
            </div>

            <h1>Toba Fabric Art</h1>
        </header>

        <h1>Management Product</h1>
        <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">
            @csrf
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name">

            <label for="product_price">Product Price:</label>
            <input type="number" name="product_price" id="product_price">

            <label for="product_description">Product Description:</label>
            <input type="text" name="product_description" id="product_description">

            <label for="stockt">Stock:</label>
            <input type="number" name="stock" id="stock">

            <label for="image_product">Image Product:</label>
            <input type="file" name="image_product" id="image_product">

            <i class="nav-item ml-2"> <!-- Menambahkan class ml-2 untuk jarak -->
                <span class="nav-link"> | </span>
            </i>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
