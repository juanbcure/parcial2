<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Compras;
use App\Models\Producto;

class ComprasController extends Controller
{
    public function index()
    {
        $usuario = Usuario::with('compras')->first();
        return $usuario;
    }

    public function store(Request $request)
    {
        //$usuario = usuario::find($request->id);

        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->telefono = $request->telefono;

        $usuario->save();


        $usuario->compras()->saveMany([
            new Compras([
                'fecha' => $request->fecha
            ]),
            new Compras([
                'fecha' => $request->fecha2
            ]),
            new Compras([
                'fecha' => $request->fecha3
            ]),
        ]);

        return "Compras guardadas con exito";
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        $usuario->nombre = $request->nombre;
        $usuario->telefono = $request->telefono;

        $usuario->compras[0]->fecha = $request->fecha;
        $usuario->compras[1]->fecha = $request->fecha2;
        $usuario->compras[2]->fecha = $request->fecha3;

        $usuario->push();

        return "Compras actualizadas con exito";
    }


}
