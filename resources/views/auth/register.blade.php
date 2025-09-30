@extends('app.layouts.template')

@section('title', 'Cadastro')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card" style="max-width: 500px; width: 100%;">
        <div class="card-header text-center">
            <h4 class="mb-0">Criar Conta - Barbearia Estilo Fino</h4>
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text" name="cargo" class="form-control" value="{{ old('cargo') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                <div class="text-center mt-3">
                    <a href="{{ route('login.show') }}" class="link-light">Já tem conta? Entrar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection