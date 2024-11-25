<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Funcionario;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $total_agendamentos = Agendamento::count();
        $total_servicos = Servico::count();
        $total_funcionarios = Funcionario::count(); 
        $total_clientes = User::count(); 
        $total_feedbacks = Feedback::count(); 

        $hoje = Carbon::today();
        $agendamentos_hoje = Agendamento::with(['cliente', 'servico', 'funcionario'])
            ->whereDate('data_agendamento', $hoje)
            ->get();

        $servicosMaisAgendados = DB::table('agendamentos')
            ->join('servicos', 'agendamentos.id_servico', '=', 'servicos.id')
            ->select('servicos.nome_servico', DB::raw('COUNT(agendamentos.id) as total_agendamentos'))
            ->groupBy('servicos.nome_servico')
            ->orderByDesc('total_agendamentos')
            ->limit(5)
            ->get();

        return view('admin', compact(
            'total_agendamentos', 
            'total_servicos', 
            'total_funcionarios', 
            'total_clientes', 
            'total_feedbacks', 
            'agendamentos_hoje',
            'servicosMaisAgendados'
        ));
    }


    public function showAgendamentos()
    {
        $hoje = Carbon::today();
        $agendamentos = Agendamento::with(['cliente', 'servico', 'funcionario'])
            ->whereDate('data_agendamento', $hoje)
            ->get();

        return view('agendamento', compact('agendamentos'));
    }
}



