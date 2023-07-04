<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remitente extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni', 
        'nombre', 
        'paterno', 
        'materno', 
        'correo', 
        'celular',
        'razonsocial', 
        'tipo_persona_id',
    ];


    public function tipoPersona(){
        return $this->belongsTo(TipoPersona::class);
    }


    public function mesaAyudas(){
        return $this->hasMany(MesaAyuda::class);
    }

    // public function departamento()
    // {
    //     return $this->belongsTo(Departamento::class);
    // }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

}
