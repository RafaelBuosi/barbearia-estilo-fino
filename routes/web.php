<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\AgendamentoController;

// Página inicial redireciona para login
Route::get('/', fn() => redirect()->route('login'));

// Autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Área autenticada
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AgendamentoController::class, 'agendaHoje'])->name('dashboard');

    // Perfil
    Route::get('/perfil', [AuthController::class, 'perfil'])->name('perfil');
    Route::put('/perfil', [AuthController::class, 'atualizarPerfil'])->name('perfil.update');

    // CRUDs
    Route::resource('clientes', ClienteController::class);
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('agendamentos', AgendamentoController::class);
});