<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';

    protected $fillable = ['nome_servico', 'preco', 'descricao'];

    public $timestamps = false;

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_servico');
    }
}



