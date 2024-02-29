<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MateriaUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($request->method() === 'PUT') {
        return [
            'materia_titulo' => ['required', 'string'],
            'materia_descricao' => ['required', 'string'],
            'materia_imagem' => ['required'],
            'materia_data_publicacao' => ['required', 'date'],
            'materia_texto_completo' => ['required', 'string'],
        ];
    } else {
        return [
            'materia_titulo' => ['string'],
            'materia_descricao' => ['string'],
            'materia_imagem' => [],
            'materia_data_publicacao' => ['date'],
            'materia_texto_completo' => ['string'],
        ];
    }

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
