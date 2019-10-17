<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;

class CalificacionController extends Controller
{
	public function index()
	{
		$usuario = Usuario::find(1);
        return $usuario->calificaciones;
		//return csrf_token();
	}

	public function store(Request $request)
	{
		$usuario = Usuario::find($request->idusuario);

		$producto = Producto::find($request->idproducto);
        
        
		$usuario->calificaciones()->create([
			'calificacion' => $request->calificacionusuario,
		]);

		$producto->calificaciones()->create([
			'calificacion' => $request->calificacionproducto,
		]);

	}

	public function update(Request $request, $id)
	{
		$usuario = Usuario::find($id);

		$producto = Producto::find($request->idproducto);

		$usuario->calificaciones[0]->calificacion = $request->calificacionusuario;

        $producto->calificaciones[0]->calificacion = $request->calificacionproducto;
        
		$usuario->push();
		
		$producto->push();
	}

	public function destroy($id)
	{
		$usuario = Usuario::find($id);

		$usuario->calificaciones()->delete();

	}

	
}
