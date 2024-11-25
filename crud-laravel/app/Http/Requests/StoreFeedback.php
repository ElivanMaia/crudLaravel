<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedback extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'avaliacao' => 'required|integer|between:1,5',
            'mensagem' => 'required|string',
            'sugestoes' => 'nullable|string', 
        ];
    }

    public function messages()
    {
        return [
            'avaliacao.required' => 'A avaliação é obrigatória.',
            'avaliacao.integer' => 'A avaliação deve ser um número inteiro.',
            'avaliacao.between' => 'A avaliação deve ser entre 1 e 5.',
            'mensagem.required' => 'A mensagem é obrigatória.',
            'mensagem.string' => 'A mensagem deve ser um texto.',
            'sugestoes.string' => 'As sugestões devem ser um texto válido.',
        ];
    }
}
