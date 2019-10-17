<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';
    
    protected $fillable = [
        'fecha',
        'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto','empleado','compras_id','producto_id')->withTimestamps();
    }
}
