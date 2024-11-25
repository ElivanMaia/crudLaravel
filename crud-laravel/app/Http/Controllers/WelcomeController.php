<?php
namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Funcionario;

class WelcomeController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        $funcionarios = Funcionario::all();

        return view('welcome', compact('servicos', 'funcionarios'));
    }
}
