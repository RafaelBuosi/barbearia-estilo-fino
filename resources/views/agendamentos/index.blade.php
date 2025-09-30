@extends('app.layouts.template')

@section('title', 'Agendamentos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Agendamentos</h4>
        <a href="{{ route('agendamentos.create') }}" class="btn btn-primary">+ Novo Agendamento</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Cliente</th>
                    <th>Funcionário</th>
                    <th>Serviço</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendamentos as $agendamento)
                    <tr>
                        <td>{{ $agendamento->inicio->format('d/m/Y') }}</td>
                        <td>{{ $agendamento->inicio->format('H:i') }} - {{ $agendamento->fim->format('H:i') }}</td>
                        <td>{{ $agendamento->cliente->nome }}</td>
                        <td>{{ $agendamento->funcionario->nome }}</td>
                        <td>{{ $agendamento->servico }}</td>
                        <td>
                            @if($agendamento->status)
                                <span class="badge bg-success">Confirmado</span>
                            @else
                                <span class="badge bg-danger">Não Confirmado</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir este agendamento?')">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum agendamento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $agendamentos->links() }}
        </div>
    </div>
</div>
@endsection