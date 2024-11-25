<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'id_user',
        'telefone_cliente',
        'data_agendamento',
        'horario_agendamento',
        'observacoes',
        'referencias',
        'id_servico',
        'id_funcionario'
    ];

    protected $dates = [
        'data_agendamento',
    ];

    protected $casts = [
        'data_agendamento' => 'date',
        'horario_agendamento' => 'string',
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    public function getFormattedHorarioAgendamentoAttribute()
    {
        return Carbon::parse($this->horario_agendamento)->format('H:i');
    }
}

