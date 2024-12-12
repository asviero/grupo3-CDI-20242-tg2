<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Nightlife</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="16x16" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" sizes="180x180">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            margin-top: 50px;
        }
        .buttons {
            margin-top: 30px;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo à noite</h1>
    <div class="buttons">
        <a href="{{ route('cadastro') }}" class="button">Cadastro</a>
        <a href="{{ route('clientes') }}" class="button">Clientes</a>
        <a href="{{ route('funcionarios') }}" class="button">Funcionários</a>
    </div>
</body>
</html>
