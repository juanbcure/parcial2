<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    
    protected $fillable = [
        'nombre',
        'telefono'
    ];

    public function compras()
    {
        return $this->hasMany('App\Models\Compras');
    }

    public function direccion()
    {
        return $this->hasOne('App\Models\Direccion');
    }
   
    public function calificaciones()
    {
        return $this->morphMany('App\Models\Calificacion', 'scoreable');
    }
}
