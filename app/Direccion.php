<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    
    protected $fillable = [
        'direccion',
        'barrio',
        'ciudad',
        'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario');
    }
}
