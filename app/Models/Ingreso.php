<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'fecha',
        'concepto',
        'monto',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
