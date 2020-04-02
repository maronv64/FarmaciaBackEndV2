<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // protected $appends = ['hola'];

    // public function getHolaAttribute()
    // {
    //     return '0';
    // }
    // public function setHolaAttribute($value)
    // {
    //     $this->hola = $value;
    // }

    public function detalle_ventas(){
        return $this->hasMany('App\DetalleVenta','idproducto','id');
    }
}
