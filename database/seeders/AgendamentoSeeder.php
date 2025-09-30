<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agendamento;
use Carbon\Carbon;

class AgendamentoSeeder extends Seeder
{
    public function run(): void
    {
        Agendamento::create([
            'cliente_id'     => 1,
            'funcionario_id' => 1,
            'inicio'         => Carbon::parse('2025-09-30 09:00:00'),
            'fim'            => Carbon::parse('2025-09-30 09:30:00'),
            'servico'        => 'Corte de cabelo',
            'status'         => 1,
            'observacoes'    => 'Agendamento gerado pelo seeder',
        ]);

        Agendamento::create([
            'cliente_id'     => 1,
            'funcionario_id' => 1,
            'inicio'         => Carbon::parse('2025-09-30 09:30:00'),
            'fim'            => Carbon::parse('2025-09-30 10:00:00'),
            'servico'        => 'Barba',
            'status'         => 0,
            'observacoes'    => 'Agendamento gerado pelo seeder',
        ]);
    }
}