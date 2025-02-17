<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model {
    protected $table = 'Pieza'; // Nombre de la tabla en la bbdd
    protected $fillable = ['cod','nombre']; // Campos que se pueden rellenar
}
