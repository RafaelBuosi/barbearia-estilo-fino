<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AgendamentoController extends Controller
{

    public function index()
    {
        $agendamentos = Agendamento::with(['cliente', 'funcionario'])
            ->orderBy('inicio', 'asc')
            ->paginate(10);

        return view('agendamentos.index', compact('agendamentos'));
    }

    public function agendaHoje()
    {
    $hoje = now()->format('Y-m-d');

    $agendamentos = Agendamento::with(['cliente', 'funcionario'])
        ->whereDate('inicio', $hoje)
        ->orderBy('inicio', 'asc')
        ->get();

        return view('app.dashboard', compact('agendamentos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();

        return view('agendamentos.create', compact('clientes', 'funcionarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id'     => 'required|exists:clientes,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'servico'        => 'required|string|max:255',
            'data'           => 'required|date',
            'hora_inicio'    => 'required',
            'hora_fim'       => 'required',
            'status'         => 'required|boolean',
            'observacoes'    => 'nullable|string',
        ]);

        $data['inicio'] = Carbon::parse($data['data'].' '.$data['hora_inicio']);
        $data['fim']    = Carbon::parse($data['data'].' '.$data['hora_fim']);

        unset($data['data'], $data['hora_inicio'], $data['hora_fim']);

        Agendamento::create($data);

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    public function edit(Agendamento $agendamento)
    {
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();

        return view('agendamentos.edit', compact('agendamento', 'clientes', 'funcionarios'));
    }

    public function update(Request $request, Agendamento $agendamento)
    {
        $data = $request->validate([
            'cliente_id'     => 'required|exists:clientes,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'servico'        => 'required|string|max:255',
            'data'           => 'required|date',
            'hora_inicio'    => 'required',
            'hora_fim'       => 'required',
            'status'         => 'required|boolean',
            'observacoes'    => 'nullable|string',
        ]);

        $data['inicio'] = Carbon::parse($data['data'].' '.$data['hora_inicio']);
        $data['fim']    = Carbon::parse($data['data'].' '.$data['hora_fim']);

        unset($data['data'], $data['hora_inicio'], $data['hora_fim']);

        $agendamento->update($data);

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento deletado com sucesso!');
    }
}