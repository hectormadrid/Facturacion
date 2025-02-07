<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'rut',
        'nombre',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'tipo_cliente'
    ];
    public function facturas()
    {

        return $this->hasMany(Facturacion::class);
    }
}
