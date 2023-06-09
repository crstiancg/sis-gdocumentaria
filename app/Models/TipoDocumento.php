<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function mesaAyudas(){
        return $this->hasMany(MesaAyuda::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
