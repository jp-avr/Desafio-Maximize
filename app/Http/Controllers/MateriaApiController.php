<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriaInserirRequest;
use App\Http\Requests\MateriaUpdateRequest;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaApiController extends Controller
{
    public function __construct(Materia $materium) { //O método construtor é chamado automaticamente quando um objeto de classe é instanciado 
        $this->materia = $materium;
    }

    public function index()
    {
        $materias = $this->materia->paginate(10); //Acessando um método de um objeto

        $materias->each(function ($materia) {
            $materia->makeHidden('materia_texto_completo');
        });
        return response()->json($materias, 200);
    }

    public function show($materia_id)
    {
        $materia = $this->materia->find($materia_id);
        if($materia === null) {
            return response()->json(['ERRO' => 'Recurso pesquisado não existe.'], 404);
        }   
        return response()->json($materia, 200);
    }

    public function store(MateriaInserirRequest $request)
    {
        // dd($request->all());
        // $materia = $this->materia->create([
        //     'materia_titulo' => $request->materia_titulo,
        //     'materia_descricao' => $request->materia_descricao,
        //     'materia_imagem' => $request->materia_imagem,
        //     'materia_data_publicacao' => date('Y-m-d'),
        //     'materia_texto_completo' => $request->materia_texto_completo,
        // ]);        
        // $image = $request->file('materia_imagem');
        // $image->store('imagens');

        $materia = $this->materia->criar($request);
        return response()->json($materia, 201);
    }

    public function update(MateriaUpdateRequest $request, $materia_id)
    {
        $materia = $this->materia->find($materia_id);
        if($materia === null) {
            return response()->json(['ERRO' => 'Impossível realizar a atualização. O recurso solicitado não existe.'], 404);
        }

        if($request->method() === 'PATCH') {
            $materia->update(array_filter($request->all()));
        } else {
            $materia->update($request->all());
        }

        return response()->json($materia, 200);
    }

    public function destroy($materia_id)
    {
        $materia = $this->materia->find($materia_id);
        if ($materia === null) {
            return response()->json(['ERRO' => 'Impossível realizar a exclusão. O recurso solicitado não existe.'], 404);
        }
        $materia->delete();
        return response()->json(['msg' => 'A marca foi removida com sucesso!'], 200);
    }
}
