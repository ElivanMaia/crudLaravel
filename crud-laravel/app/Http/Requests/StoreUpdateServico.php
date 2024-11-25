<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateServico extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_servico' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:51200',
        ];
    }

    public function messages()
    {
        return [
            'nome_servico.required' => 'O nome do serviço é obrigatório.',
            'nome_servico.string' => 'O nome do serviço deve ser um texto.',
            'nome_servico.max' => 'O nome do serviço não pode ter mais de 255 caracteres.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'imagem.file' => 'A imagem deve ser um arquivo.',
            'imagem.mimes' => 'A imagem deve ser nos formatos jpeg, png, jpg ou gif.',
            'imagem.max' => 'A imagem não pode ter mais de 50MB.',
        ];
    }
}
