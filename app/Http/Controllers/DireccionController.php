<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Direccion;

class DireccionController extends Controller
{
    public function validator($data)
    {
        return Validator::make($data, [
            'pais' => ['string', 'max:2', 'required'],
            'estado' => ['string', 'required'],
            'ciudad' => ['string', 'required'],
            'calle' => ['string', 'required'],
            'numero' => ['numeric', 'required'],
            'apartamento' => ['string'],
            'codigo-postal' => ['string'],
        ]);
    }

    public function create(array $data)
    {
        return Direccion::create([
            'codigo_pais' => $data['pais'],
            'estado' => $data['estado'],
            'ciudad' => $data['ciudad'],
            'calle' => $data['calle'],
            'numero' => $data['numero'],
            'apartamento' => $data['apartamento'],
            'codigo_postal' => $data['codigo-postal'],
            'usuario_id' => Auth::id(),
        ]);
    }

    public function agregar(Request $req)
    {
        $data = $req->all();

        // Valido la informacion
        $this->validator($data)->validate();

        // Creo la direccion
        $this->create($data);
    }
    
    public function agregarDesdeEnvio(Request $req)
    {
        $this->agregar($req);
        return redirect(route('datosEnvio'));
    }
}
