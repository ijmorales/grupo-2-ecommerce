<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function formAgregarCategoria()
    {
        return view('categoria.agregarCategoria');
    }

    public function agregarCategoria()
    {
        //
    }

    public function listadoCategorias()
    {
        $vac = compact('categoria');
        return view('categoria.listadoCategorias', $vac);
    }

    public function listadoAPI()
    {
        $categorias = Categoria::all();
        return $categorias;
    }
}
