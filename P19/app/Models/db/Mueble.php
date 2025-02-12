<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;

class Mueble extends Model {
    protected $table = 'Mueble'; // Nombre de la tabla en la bbdd
    protected $fillable = ['nombre', 'precio']; // Campos que se pueden rellenar
}
