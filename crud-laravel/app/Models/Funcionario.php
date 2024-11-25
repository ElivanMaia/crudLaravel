<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = ['nome', 'caminho_barbearia', 'foto', 'frase_pessoal'];

    public $timestamps = true;

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_funcionario');
    }
}

