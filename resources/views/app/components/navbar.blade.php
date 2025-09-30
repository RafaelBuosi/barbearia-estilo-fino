<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastros
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            {{-- Clientes --}}
            <a class="dropdown-item" href="{{ route('clientes.create') }}">Cadastrar Cliente</a>
            <a class="dropdown-item" href="{{ route('clientes.index') }}">Visualizar Clientes</a>

            <div class="dropdown-divider"></div>

            {{-- Funcionários --}}
            <a class="dropdown-item" href="{{ route('funcionarios.create') }}">Cadastrar Funcionário</a>
            <a class="dropdown-item" href="{{ route('funcionarios.index') }}">Visualizar Funcionários</a>

            <div class="dropdown-divider"></div>

            {{-- Agendamentos --}}
            <a class="dropdown-item" href="{{ route('agendamentos.create') }}">Novo Agendamento</a>
            <a class="dropdown-item" href="{{ route('agendamentos.index') }}">Visualizar Agendamentos</a>
        </div>
    </li>
</ul>