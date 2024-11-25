<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Agendamento;

class StoreAgendamentoProfile extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'data_agendamento' => 'required|date|after_or_equal:today',
            'horario_agendamento' => 'required|string', 
            'id_servico' => 'required|exists:servicos,id',
            'id_funcionario' => 'required|exists:funcionarios,id',
        ];
    }

    public function messages(): array
    {
        return [
            'data_agendamento.required' => 'A data do agendamento é obrigatória.',
            'data_agendamento.after_or_equal' => 'A data do agendamento deve ser hoje ou uma data futura.',
            'horario_agendamento.required' => 'O horário do agendamento é obrigatório.',
            'id_servico.exists' => 'O serviço selecionado não existe.',
            'id_funcionario.exists' => 'O funcionário selecionado não existe.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $this->input('data_agendamento');
            $hora = $this->input('horario_agendamento');
            $funcionario = $this->input('id_funcionario');

            $existeAgendamento = Agendamento::where('id_funcionario', $funcionario)
                ->where('data_agendamento', $data)
                ->where('horario_agendamento', $hora)
                ->exists();

            if ($existeAgendamento) {
                $validator->errors()->add('horario_agendamento', 'Este horário já está ocupado para o funcionário selecionado.');
            }
        });
    }
}
