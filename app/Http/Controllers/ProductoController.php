<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::with('compras')->first();
        return $producto;
    }

    public function store(Request $request)
    {
        
        $producto = new Producto();

        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $producto->save();
        
        $producto->compras()->attach([$request->compras1, $request->compras2]);
       
        return "Producto y compras guardadas con exito";
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $producto->update();
        
        $producto->compras()->sync([$request->compras1, $request->compras2]);
        
        return "compras actualizadas con exito";
    }


}
