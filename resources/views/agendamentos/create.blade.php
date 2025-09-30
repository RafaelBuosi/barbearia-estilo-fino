@extends('app.layouts.template')

@section('title', 'Novo Agendamento')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Novo Agendamento</h4>
        <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Voltar</a>
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

        <form method="POST" action="{{ route('agendamentos.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <select name="cliente_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Funcionário</label>
                <select name="funcionario_id" class="form-select" required>
                    <option value="">Selecione...</option>
                    @foreach($funcionarios as $f)
                        <option value="{{ $f->id }}">{{ $f->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Serviço</label>
                <input type="text" name="servico" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hora de Início</label>
                <input type="time" name="hora_inicio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hora de Fim</label>
                <input type="time" name="hora_fim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="0">Não Confirmado</option>
                    <option value="1">Confirmado</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection