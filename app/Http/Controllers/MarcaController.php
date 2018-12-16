<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    public function agregarForm(){
        return view('marca.agregarMarca');
    }

    public function agregar(Request $req){
        $this->validator($req->all())->validate();
        $this->create($req->all());
        if($req->input('agregarOtra') == 'on')
        {
            return redirect('/marcas/agregar');
        }else{
            return redirect('/marcas');
        }
    }

    public function listadoMarcas()
    {
        $marcas = Marca::all();
        $vac = compact('marcas');
        return view('marca.listadoMarca', $vac);
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:200', 'unique:marcas'],
        ]);
    }

    protected function create(array $data){
        return Marca::create([
            'nombre' => $data['nombre'],
        ]);
    }

    public function listadoAPI()
    {
        $marcas = Marca::all();
        return $marcas;
    }
}
