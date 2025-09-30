@extends('app.layouts.template')

@section('title', 'Editar Agendamento')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Editar Agendamento</h4>
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

        <form method="POST" action="{{ route('agendamentos.update', $agendamento->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <select name="cliente_id" class="form-select" required>
                    @foreach($clientes as $c)
                        <option value="{{ $c->id }}" {{ old('cliente_id', $agendamento->cliente_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Funcionário</label>
                <select name="funcionario_id" class="form-select" required>
                    @foreach($funcionarios as $f)
                        <option value="{{ $f->id }}" {{ old('funcionario_id', $agendamento->funcionario_id) == $f->id ? 'selected' : '' }}>
                            {{ $f->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Serviço</label>
                <input type="text" name="servico" class="form-control"
                       value="{{ old('servico', $agendamento->servico) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="date" name="data" class="form-control"
                       value="{{ old('data', $agendamento->inicio ? $agendamento->inicio->format('Y-m-d') : '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hora de Início</label>
                <input type="time" name="hora_inicio" class="form-control"
                       value="{{ old('hora_inicio', $agendamento->inicio ? $agendamento->inicio->format('H:i') : '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hora de Fim</label>
                <input type="time" name="hora_fim" class="form-control"
                       value="{{ old('hora_fim', $agendamento->fim ? $agendamento->fim->format('H:i') : '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="0" {{ old('status', $agendamento->status) == 0 ? 'selected' : '' }}>Não Confirmado</option>
                    <option value="1" {{ old('status', $agendamento->status) == 1 ? 'selected' : '' }}>Confirmado</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control" rows="3">{{ old('observacoes', $agendamento->observacoes) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection