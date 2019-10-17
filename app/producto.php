<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    
    protected $fillable = [
        'descripcion',
        'precio',
    ];

    public function compras()
    {
        return $this->belongsToMany('App\Models\Compras','empleado','producto_id','compras_id')->withTimestamps();
    }

    public function calificaciones()
    {
        return $this->morphMany('App\Models\Calificacion', 'scoreable');
    }
}
