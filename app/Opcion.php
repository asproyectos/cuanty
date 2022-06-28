<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'nombre', 'orden', 'activa', 'pregunta_id'];
}
