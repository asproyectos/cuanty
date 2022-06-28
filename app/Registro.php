<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'fecha',
        'hora_inicio',
        'hora_final',
        'hora_marea_alta',
        'numero_sitio',
        'comunidad_id',
        'latitud',
        'longitud',
        'nombre_observador',
        'user_id',
        'especie_id',
        'cantidad',
        'cantidad_adulto',
        'cantidad_juvenil',
        'cantidad_cria',
        'cantidad_total',
        'categoria_edad_id',
        'tipo_habitat_id',
        'comentarios',
        'especie_identificada',
    ];

    protected $dates = [
        'fecha', 'hora_inicio', 'hora_final', 'hora_marea_alta'
    ];

    public function especie()
    {
        return $this->belongsTo('App\Especie');
    }

    public function comunidad()
    {
        return $this->belongsTo('App\Comunidad');
    }

    public function categoriaEdad()
    {
        return $this->belongsTo('App\CategoriaEdad');
    }

    public function tipoHabitat()
    {
        return $this->belongsTo('App\TipoHabitat');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function imagenesRegistro()
    {
        return $this->hasMany('App\ImagenRegistro');
    }
}
