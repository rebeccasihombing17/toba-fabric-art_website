<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Registrasi Toba Fabric Art</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #f0f8ff; /* Light Blue background color */
            color: #333; /* Dark gray text color */
        }

        .header {
            position: relative;
            text-align: center;
            background-color: #007BFF; /* Blue header background color */
            padding: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #0056b3; /* Darker blue border bottom */
        }

        .header img {
            width: 200px;
        }

        .Logo {
            border-radius: 10px;
            margin-top: 20px;
        }

        .registration-form {
            margin-top: 50px;
            max-width: 400px; /* Set the maximum width of the form */
            margin-left: auto;
            margin-right: auto;
        }

        fieldset {
            border: 2px solid #007BFF; /* Blue border for fieldset */
            background-color: #f0f0f0; /* Light gray background color */
            padding: 20px; /* Space around the content of the fieldset */
            margin: 20px 0; /* Space outside the fieldset */
            border-radius: 15px; /* Rounded corners for the fieldset */
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #007BFF; /* Blue label text color */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #007BFF; /* Blue border for input fields */
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            color: #007BFF; /* Blue text color for select */
        }

        .register-button {
            padding: 15px 25px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .register-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        p {
            margin-top: 15px;
        }

        footer {
            background-color: #f0f8ff; /* Light Blue footer background color */
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }

        footer img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
<div class="header">
  <h1>Toba Fabric Art</h1>
</div>

<div class = "Logo">
  <img src="storage/logo.jpeg" alt= "Toba Fabric Art" width="200" height="200">
</div>

<div class="registration-form">

  <form method="POST" action="/register">
  {{ csrf_field() }}
  <fieldset>
    <h2>Registrasi</h2>
    <label for="full_name">Name:</label><br>
    <input type="text" id="full_name" name="full_name"><br><br>

    <label for="birth_date">Birth date:</label><br>
    <input type="text" id="birth_date" name="birth_date"><br><br>

    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>

    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="passowrd">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>

    <label for="status">Status:</label><br>
      <select id="status" name="status">
      <option value="pembeli">Pembeli</option>
      <option value="penjual">Penjual</option>
    </select><br><br>

    
    <input type="submit" value="Registrasi">

    <p>Did you have an account?<a href="login">Login</a></p>

  </fieldset>
  <h6><span style="color:red;">*</span>Status "Penjual" hanya dimiliki untuk penjual utama, pelanggan diharapkan untuk tidak registrasi menggunakan status "Penjual"</h6>
  </form>

  <footer>
     <img src="storage/].jpeg" alt="Footer Image">
     <p>&copy; 2023 Your Website</p>
  </footer>
</div>
</head>
<body>
</html>