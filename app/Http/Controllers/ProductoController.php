<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{

    protected $redirectTo = '/productos';
    
    public function validator(array $data)
    {
        return Validator::make($data, [
            'categoria' => ['exists:categorias,id', 'numeric', 'required'],
            'marca' => ['exists:marcas,id', 'numeric', 'required'],
            'nombre' => ['string', 'required'],
            'precio' => ['numeric', 'required'],
            'imagen-principal' => ['image', 'max:6000'],
            'tipo-imagen' => [Rule::in(['S', 'M', 'L'])]
        ]);
    }

    public function listadoProducto()
    {
        $productos = Producto::all();
        $vac = compact('productos');
        return view('producto.listadoProducto', $vac);
    }

    public function agregarForm()
    {
        return view('producto.agregarProducto');
    }

    protected function create(array $data){
        return Producto::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'id_categoria' => $data['categoria'],
            'id_marca' => $data['marca']
        ]);
    }

    public function agregar(Request $req)
    {
        $datos = $req->all();
        $this->validator($datos)->validate();

        $producto = $this->create($datos);
        
        
        if($req->file('imagen-principal'))
        {
            $file = $req->file('imagen-principal');
            $fileName = basename($req->file('imagen-principal')->store("public/img"));
            $imagen = Imagen::create([
                'size' => $file->getClientSize(),
                'nombre' => $fileName,
                'tipo' => $datos['tipo-imagen'],
            ]);
            $producto->imagenes()->attach($imagen->id);
        }

        return redirect($this->redirectTo);
    }
}
