<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::paginate(10);
        return view('welcome', compact('materias'));
    }

    public function inserir()
    {
        return view('inserir_materia');
    }
}
