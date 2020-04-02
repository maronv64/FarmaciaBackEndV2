<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{

    // protected $contar_usuarios=0;
    // protected $appends = ['contar_usuarios'];
    //
    // protected $fillable = [
    //     'cod', 'descripcion', 'estado_del','nome_token',
    // ];

    public function usuarios(){
        return $this->hasMany('App\User','idtipo','id')->where('estado_del','1');
    }
    // public function contar_usuarios(){
    //     return $this->$contar_usuarios;
    //     // return $this->hasMany('App\User','idtipo','id')->where('estado_del','1');
    //     //return $this->usuarios()->count();
    // }
}
