<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFuncionario extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'caminho_barbearia' => 'required|string',
            'frase_pessoal' => 'nullable|string',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:51200',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'caminho_barbearia.required' => 'O caminho da barbearia é obrigatório.',
            'caminho_barbearia.string' => 'O caminho da barbearia deve ser um texto.',
            'frase_pessoal.string' => 'A frase pessoal deve ser um texto válido.',
            'foto.file' => 'A foto deve ser um arquivo.',
            'foto.mimes' => 'A foto deve ser nos formatos jpeg, png, jpg ou gif.',
            'foto.max' => 'A foto não pode ter mais de 50MB.',
        ];
    }
}
