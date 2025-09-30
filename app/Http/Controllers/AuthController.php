<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout realizado.');
    }

    public function perfil()
    {
        $funcionario = Auth::user();
        return view('auth.perfil', compact('funcionario'));
    }

    public function atualizarPerfil(Request $request)
    {
        $funcionario = Auth::user();

        $data = $request->validate([
            'nome'     => 'required|string|max:255',
            'telefone' => 'nullable|string|max:50',
            'cargo'    => 'nullable|string|max:100',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $funcionario->update($data);

        return redirect()->route('perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
}