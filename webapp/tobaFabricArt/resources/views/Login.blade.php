<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <title>Login Toba Fabric Art</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #f0f8ff;
            color: #333;
        }

        .header {
            background-color: #007BFF;
            padding: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #0056b3;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .Logo {
            border-radius: 10px;
            margin-top: 20px;
        }

        .Konten {
            color: grey;
            margin-bottom: 20px;
        }

        .Login-form {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        fieldset {
            border: 2px solid #007BFF;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 20px 0;
            border-radius: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #007BFF;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #007BFF;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .Login-button {
            padding: 15px 25px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .Login-button:hover {
            background-color: #0056b3;
        }

        .alert.alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .error-marker {
            color: #721c24;
            font-size: 20px;
            margin-right: 5px;
        }

        footer {
            background-color: #f0f8ff;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
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

    <div class="Logo">
        <img src="storage/Logo.jpeg" alt="Toba Fabric Art" width="200" height="200">
    </div>

    <div class="Konten">
        <h2>Selamat Datang di Toba Fabric Art!</h2>
        <h3>Eksplorasi Kain dan Seni Batak</h3>
    </div>

    <div class="Login-form">

        <form method="POST" action="/login">
            {{ csrf_field() }}
            <fieldset>
                <h2>Login</h2>

                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br>

                <input type="submit" class="Login-button" value="Login">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <span class="error-marker">!</span> {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p>Have you not created an account yet? <a href="register">Register</a></p>

            </fieldset>
        </form>

        <footer>
            <img src="storage/].jpeg" alt="Footer Image">
            <p>&copy; 2023 Your Website</p>
        </footer>
    </div>
</body>
</html>
