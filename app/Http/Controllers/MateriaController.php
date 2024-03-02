<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function inserir()
    {
        return view('inserir_materia');
    }

    public function show()
    {
        return view('show', compact('materia'));
    }
}
