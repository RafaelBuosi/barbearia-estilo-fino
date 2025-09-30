@extends('app.layouts.template')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Agenda do Dia - {{ now()->format('d/m/Y') }}</h4>
    </div>

    <div class="card-body">
        @if($agendamentos->isEmpty())
            <p class="text-center">Nenhum agendamento encontrado para hoje.</p>
        @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Horário</th>
                        <th>Cliente</th>
                        <th>Funcionário</th>
                        <th>Serviço</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendamentos as $agendamento)
                        <tr>
                            <td>
                                {{ $agendamento->inicio->format('H:i') }} -
                                {{ $agendamento->fim->format('H:i') }}
                            </td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection