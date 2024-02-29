<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaInserirRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'materia_titulo' => ['required', 'string'],
            'materia_descricao' => ['required', 'string'],
            'materia_imagem' => ['required','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'materia_data_publicacao' => ['nullable', 'date'],
            'materia_texto_completo' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'materia_titulo.required' => 'O campo :attribute é obrigatório',
            'materia_titulo.string' => 'O campo :attribute é inválido',

            'materia_descricao.required' => 'O campo :attribute é obrigatório',
            'materia_descricao.string' => 'O campo :attribute é inválido',

            'materia_imagem.required' => 'O campo :attribute é obrigatório',
            // 'materia_imagem.required' => 'O campo :attribute é obrigatório',

            'materia_data_publicacao.required' => 'O campo :attribute é obrigatório',
            'materia_data_publicacao.date' => 'O campo :attribute é inválido',

            'materia_texto_completo.required' => 'O campo :attribute é obrigatório',
            'materia_texto_completo.string' => 'O campo :attribute é inválido',
        ];
        
    }
}
