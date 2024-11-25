<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servico;
use App\Models\Funcionario;
use App\Models\Agendamento;

class UserController extends Controller
{
    public function dashboard()
    {
        $servicos = Servico::all();
        $funcionarios = Funcionario::all();
        $agendamentos = Agendamento::with(['cliente', 'servico', 'funcionario'])
            ->where('id_user', auth()->id())
            ->get();

        return view('dashboard', compact('servicos', 'funcionarios', 'agendamentos'));
    }

    public function listUsers()
    {
        $usuarios = User::all();
        return view('cliente', compact('usuarios'));
    }
}
