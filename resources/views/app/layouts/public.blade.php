<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Barbearia Estilo Fino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #fff;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
        }
        .form-control {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #fff;
        }
        .form-control:focus {
            background-color: #2a2a2a;
            color: #fff;
            border-color: #C9A227;
            box-shadow: 0 0 0 0.2rem rgba(201,162,39,0.25);
        }
        .btn-primary {
            background-color: #C9A227;
            border: none;
            color: #121212;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #a8841d;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        @yield('content')
    </div>
</body>
</html>