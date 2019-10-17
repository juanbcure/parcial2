<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Direccion;

class UsuarioController extends Controller
{

    public function index()
    {
      $usuario = Usuario::with('direccion')->first();
      return $usuario;
      //return csrf_token();
    }

    public function store(Request $request)
    {
      $usuario = new Usuario();

      $usuario->nombre = $request->nombre;
      $usuario->telefono = $request->telefono;

      $usuario->save();

      $direccion = new Direccion();

      $direccion->ubicacion = $request->ubicacion;
      $direccion->barrio = $request->barrio;
      $direccion->ciudad = $request->ciudad;

      $usuario->direecion()->save($direccion);

      return 'Se guardo correctamente el usuario y su direccion';
    }

    public function update(Request $request, $id)
    {
      $usuario = Usuario::find($id);

      $usuario->nombre = $request->nombre;
      $usuario->telefono = $request->telefono;

      $usuario->update();

      $direccion['ubicacion'] = $request->ubicacion;
      $direccion['barrio'] = $request->barrio;
      $direccion['ciudad'] = $request->ciudad;

      $usuario->direccion()->update($direccion);

      return 'Se actualizo correctamente el usuario y su direccion';
    }
    
}
