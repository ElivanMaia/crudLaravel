<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Funcionario;
use App\Http\Requests\StoreAgendamentoProfile;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::with(['cliente', 'servico', 'funcionario'])->get();
        $total_agendamentos = Agendamento::count();

        return view('agendamento', compact('agendamentos', 'total_agendamentos'));
    }


    public function store(StoreAgendamentoProfile $request)
    {
        $existeAgendamento = Agendamento::where('id_user', auth()->id())
            ->where('data_agendamento', '>=', now())
            ->exists();

        if ($existeAgendamento) {
            return back()->with('error', 'Você já tem um agendamento futuro e não pode agendar novamente.');
        }

        Agendamento::create([
            'telefone_cliente' => $request->telefone_cliente,
            'data_agendamento' => $request->data_agendamento,
            'horario_agendamento' => $request->horario_agendamento,
            'observacoes' => $request->observacoes,
            'referencias' => $request->referencias,
            'id_servico' => $request->id_servico,
            'id_user' => auth()->id(),
            'id_funcionario' => $request->id_funcionario,
        ]);

        return back()->with('success', 'Agendamento realizado com sucesso!');
    }


    public function edit($id)
{
    $agendamento = Agendamento::with(['cliente', 'servico', 'funcionario'])->findOrFail($id);

    $agendamento->data_agendamento = \Carbon\Carbon::parse($agendamento->data_agendamento);
    $agendamento->horario_agendamento = \Carbon\Carbon::parse($agendamento->horario_agendamento);

    $servicos = Servico::all();
    $funcionarios = Funcionario::all();

    return view('edit_agendamento', compact('agendamento', 'servicos', 'funcionarios'));
}


public function update(StoreAgendamentoProfile $request, $id)
{
    $agendamento = Agendamento::findOrFail($id);

    $agendamento->update([
        'data_agendamento' => $request->data_agendamento,
        'horario_agendamento' => $request->horario_agendamento,
        'id_servico' => $request->id_servico,
        'id_funcionario' => $request->id_funcionario,
    ]);

    return redirect()->route('dashboard')->with('success', 'Agendamento atualizado com sucesso!');
}


public function destroy($id)
{
    $agendamento = Agendamento::findOrFail($id);

    $agendamento->delete();

    if (auth()->user()->cargo == 1) {
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    } else {
        return redirect()->route('dashboard')->with('success', 'Agendamento excluído com sucesso!');
    }
}


}
