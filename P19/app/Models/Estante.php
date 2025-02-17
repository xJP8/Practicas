<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estante extends Model {
    protected $table = 'Estante'; // Nombre de la tabla en la bbdd
    protected $fillable = ['cod_pieza','unidades']; // Campos que se pueden rellenar
}
