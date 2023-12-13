<!DOCTYPE html>
<html>
<head>
    <title>MAIL DE ACTIVACION</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 15px 25px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            width: 100%;
            font-size: 18px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .hamster-image {
            display: block;
            margin: 0 auto;
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido a HamsterApp!</h1>
        <p>¡Estamos contentos de tenerte con nosotros! Da click en el botón para activar tu cuenta:</p>
        <a href="{{ $signedUrl }}" class="button">Activar cuenta</a>
    </div>
</body>
</html>