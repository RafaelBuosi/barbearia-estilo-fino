<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    protected $fillable = ['nome', 'email', 'password', 'telefone', 'cargo', 'ativo'];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}