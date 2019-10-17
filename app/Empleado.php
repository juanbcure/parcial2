<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    
    protected $fillable = [
        'compras_id',
        'producto_id'
    ];


    public function compras()
    {
        return $this->belongsTo('App\Models\Compras');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }
}
