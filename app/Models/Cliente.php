<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    use HasFactory;
    protected $table = 'clientes'; // Nombre de la tabla
    protected $primaryKey = 'rut'; // Especificar que la clave primaria es 'rut'
    public $incrementing = false; // Indicar que la clave primaria no es autoincremental
    protected $keyType = 'string'; // Especificar que la clave primaria es de tipo string
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
