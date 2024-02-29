<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = [
        'materia_titulo',
        'materia_descricao',
        'materia_imagem',
        'materia_data_publicacao',
        'materia_texto_completo',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'materia_id';

    public static function criar($request)
    {
        $image = $request->file('materia_imagem');
        $imagem_urn = $image->store('imagens', 'public');

        return self::create([
            'materia_titulo' => $request->materia_titulo,
            'materia_descricao' => $request->materia_descricao,
            'materia_imagem' => $imagem_urn,
            'materia_data_publicacao' => date('Y-m-d'),
            'materia_texto_completo' => $request->materia_texto_completo,
        ]);
    }

    public function atualizar($request)
    {
        $image = $request->file('materia_imagem');
        $imagem_urn = $image->store('imagens', 'public');

        return self::update([
            'materia_titulo' => $request->materia_titulo,
            'materia_descricao' => $request->materia_descricao,
            'materia_imagem' => $imagem_urn,
            'materia_data_publicacao' => date('Y-m-d'),
            'materia_texto_completo' => $request->materia_texto_completo,
        ]);
    }
}
