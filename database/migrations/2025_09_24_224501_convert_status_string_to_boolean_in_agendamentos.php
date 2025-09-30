<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->boolean('status_tmp')->default(0)->after('servico');
        });

        DB::table('agendamentos')
            ->where('status', 'confirmado')
            ->update(['status_tmp' => 1]);

        DB::table('agendamentos')
            ->whereIn('status', ['não confirmado', 'nao confirmado', 'pendente'])
            ->orWhereNull('status')
            ->update(['status_tmp' => 0]);

        Schema::table('agendamentos', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('agendamentos', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('servico');
        });

        DB::statement('UPDATE agendamentos SET status = status_tmp');

        Schema::table('agendamentos', function (Blueprint $table) {
            $table->dropColumn('status_tmp');
        });
    }

    public function down(): void
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->string('status_tmp')->default('não confirmado')->after('servico');
        });

        DB::statement("UPDATE agendamentos SET status_tmp = CASE WHEN status = 1 THEN 'confirmado' ELSE 'não confirmado' END");

        Schema::table('agendamentos', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('agendamentos', function (Blueprint $table) {
            $table->string('status')->default('não confirmado')->after('servico');
        });

        DB::statement('UPDATE agendamentos SET status = status_tmp');

        Schema::table('agendamentos', function (Blueprint $table) {
            $table->dropColumn('status_tmp');
        });
    }
};