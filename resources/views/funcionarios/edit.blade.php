@extends('app.layouts.template')

@section('title', 'Editar Funcionário')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Editar Funcionário</h4>
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

        <form method="POST" action="{{ route('funcionarios.update', $funcionario->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $funcionario->nome) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $funcionario->email) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $funcionario->telefone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" name="cargo" class="form-control" value="{{ old('cargo', $funcionario->cargo) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Senha (opcional)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar Nova Senha</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="ativo" value="1" class="form-check-input" id="ativo"
                       {{ $funcionario->ativo ? 'checked' : '' }}>
                <label class="form-check-label text-white" for="ativo">Ativo</label>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection