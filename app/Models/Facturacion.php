<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function items()
    {
        return $this->hasMany(FacturaItem::class);
    }
}