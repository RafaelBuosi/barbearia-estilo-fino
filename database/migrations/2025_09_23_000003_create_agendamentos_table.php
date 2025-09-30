<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();
            $table->foreignId('funcionario_id')->constrained('funcionarios')->cascadeOnDelete();
            $table->dateTime('inicio');
            $table->dateTime('fim')->nullable();
            $table->string('servico')->nullable();
            $table->enum('status', ['pendente', 'confirmado', 'concluido', 'cancelado'])->default('pendente');
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->index(['inicio', 'funcionario_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};