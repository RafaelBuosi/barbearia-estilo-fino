<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;

class FuncionarioSeeder extends Seeder
{
    public function run(): void
    {
        Funcionario::updateOrCreate(
            ['email' => 'admin@barbearia.com'],
            [
                'nome' => 'Administrador',
                'password' => Hash::make('admin123'),
                'cargo' => 'admin',
                'telefone' => '(16) 97777-3333',
                'ativo' => true,
            ]
        );
    }
}