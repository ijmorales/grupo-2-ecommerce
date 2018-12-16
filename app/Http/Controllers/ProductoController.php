<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Imagen;
use App\Categoria;
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
            'tipo-imagen' => [Rule::in(['S', 'M', 'L'])],
            'descripcion' => ['string', 'max:65535'],
        ]);
    }

    public function listadoProducto()
    {
        $productos = Producto::paginate(6);
        $vac = compact('productos');
        return view('producto.listadoProducto', $vac);
    }

    public function listadoPorCategoria($id)
    {
        $categoria = Categoria::find($id);
        $productos = $categoria->productos()->paginate(6);
        $vac = compact('productos');
        return view('producto.listadoProducto', $vac);
    }

    public function agregarForm()
    {
        return view('producto.agregarProducto');
    }

    protected function create(array $data)
    {
        return Producto::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'categoria_id' => $data['categoria'],
            'marca_id' => $data['marca'],
            'descripcion' => $data['descripcion'],
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

    public function detalle($id)
    {
        $producto = Producto::find($id);
        if(!$producto)
        {
            return Response('', 404);
        }
        $vac = compact('producto');
        return view('producto.detalleProducto', $vac);
    }
}
