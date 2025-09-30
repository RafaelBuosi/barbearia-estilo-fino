<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::paginate(10);
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email',
            'telefone' => 'nullable|string|max:20',
            'cargo' => 'nullable|string|max:100',
            'password' => 'required|confirmed|min:6',
            'ativo' => 'boolean',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['ativo'] = $request->has('ativo') ? 1 : 0;

        Funcionario::create($data);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
            'telefone' => 'nullable|string|max:20',
            'cargo' => 'nullable|string|max:100',
            'password' => 'nullable|confirmed|min:6',
            'ativo' => 'boolean',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $data['ativo'] = $request->has('ativo') ? 1 : 0;

        $funcionario->update($data);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}