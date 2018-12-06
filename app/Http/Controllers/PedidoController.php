<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public $redirectTo = '';

    public function generar(Request $req){
        $carrito = $req->session()->has('carrito');
        foreach($producto as $carrito){

        }
    }
}
