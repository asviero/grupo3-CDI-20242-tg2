<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Casa Noturna')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <style>
        /* Tema escuro com cores vibrantes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212; /* Cor escura de fundo */
            color: #f0f0f0; /* Texto claro */
        }

        h1 {
            text-align: center;
            color: #ff4081; /* Rosa neon */
            text-transform: uppercase;
            font-size: 2.5rem;
            margin-top: 50px;
            text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
        }

        form {
            max-width: 450px;
            margin: 50px auto;
            background: #1e1e1e; /* Fundo escuro */
            padding: 30px;
            border: 1px solid #ff4081; /* Bordas neon */
            border-radius: 8px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4);
        }

        form div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #fff;
        }

        input[type="text"],
        input[type="date"],
        input[type="radio"],
        button {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #333;
            color: #f0f0f0;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            width: auto;
            display: inline-block;
            margin-right: 8px;
        }

        button {
            background-color: #ff4081; /* Botão com cor neon vibrante */
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e53977; /* Cor de hover mais escura */
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
        }

        .error {
            color: #ff5252; /* Erro com cor vibrante de alerta */
            font-size: 12px;
            margin-top: 5px;
        }

        /* Efeito neon ao focar nos campos */
        input:focus, button:focus {
            outline: none;
            border: 1px solid #ff4081;
            box-shadow: 0 0 5px 3px rgba(255, 64, 129, 0.8);
        }

        .radio-group label {
            color: #ddd;
            font-weight: normal;
        }
    </style>
</head>
<body>
    @yield('content')  <!-- Aqui vai o conteúdo de cada página -->
</body>
</html>