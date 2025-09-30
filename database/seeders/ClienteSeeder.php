<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create([
            'nome' => 'João da Silva',
            'telefone' => '(16) 99999-1111',
            'email' => 'joao.silva@example.com',
            'observacoes' => 'Cliente fixo',
        ]);

        Cliente::create([
            'nome' => 'Maria Oliveira',
            'telefone' => '(16) 98888-2222',
            'email' => 'maria.oliveira@example.com',
            'observacoes' => 'Prefere atendimento aos sábados',
        ]);
    }
}