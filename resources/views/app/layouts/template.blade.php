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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        nav.navbar {
            background-color: #C9A227;
        }
        .navbar-brand {
            font-weight: bold;
            color: #121212 !important;
        }
        .navbar-nav .nav-link {
            color: #121212 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }
        .navbar-nav .nav-link:hover {
            text-decoration: underline;
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
        .btn-secondary {
            background-color: #444;
            border: none;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #666;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
        }
        .card-header {
            color: #fff !important;
            background-color: transparent;
            border-bottom: 1px solid #333;
        }
        .form-label {
            color: #fff !important;
            font-weight: 500;
        }
        .form-control, .form-select {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #fff;
        }
        .form-control:focus, .form-select:focus {
            background-color: #2a2a2a;
            color: #fff;
            border-color: #C9A227;
            box-shadow: 0 0 0 0.2rem rgba(201,162,39,0.25);
        }
        .table {
            background-color: #1e1e1e !important;
            color: #fff !important;
            margin-bottom: 0;
        }
        .table thead th {
            background-color: #C9A227 !important;
            color: #121212 !important;
        }
        .table tbody tr {
            background-color: #1e1e1e !important;
        }
        .table tbody td {
            background-color: #1e1e1e !important;
            color: #fff !important;
        }
        .table-hover tbody tr:hover {
            background-color: #333 !important;
        }
        .badge-status {
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-block;
        }
        .badge-confirmado {
            background-color: #28a745;
            color: #fff;
        }
        .badge-cancelado {
            background-color: #dc3545;
            color: #fff;
        }
        footer {
            background-color: #1e1e1e;
            border-top: 1px solid #333;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }
        footer small {
            color: #aaa;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @auth
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Barbearia Estilo Fino</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('funcionarios.index') }}">Funcionários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agendamentos.index') }}">Agendamentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('perfil') }}">Perfil</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Formulário oculto de logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @endauth

    {{-- Conteúdo --}}
    <div class="container my-4">
        @yield('content')
    </div>

    {{-- Rodapé --}}
    <footer>
        <small>&copy; {{ date('Y') }} Rafael Buosi e Leandro Trevizani - Todos os direitos reservados.</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>