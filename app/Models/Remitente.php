<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remitente extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'nombre', 'paterno', 'materno', 'correo', 'celular', 'tipo_persona_id'];


    public function TipoPersona(){
        return $this->belongsTo(TipoPersona::class);
    }


    public function MesaAyuda(){
        return $this->hasMany(MesaAyuda::class);
    }

}
