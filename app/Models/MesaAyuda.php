<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaAyuda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 
        'asunto', 
        'archivo', 
        'folio', 
        'fingreso', 
        'estado', 
        'remitente_id', 
        'tipo_documento_id',
        'oficina_id',
        'procedimiento_id'];

    public static $rule = [
            'numero' => 'required',
            'asunto' => 'required',
            'archivo' => 'required',
            'folio' => 'required',
            // 'remitente_id' => 'required',
            // 'tipo_documento' => 'required',
            // 'oficina_id' => 'required',
            // 'procedimiento_id' => 'required',
            'dni'  => 'required',
            'nombre'  => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'correo' => 'required',
            'celular' => 'required',
            // 'tipo_persona_id' => 'required',
    ];

    protected $casts = ['fingreso' => 'date'];
    public function remitente(){
        return $this->belongsTo(Remitente::class);
    }

    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }


    public function getStatusColorAttribute()
    {
        return [
            'Revision' => 'gray',
            'Aceptado' => 'green',
            'No Aceptado' => 'red',
        ][$this->estado];
    }
    
    public function procedimiento()
    {
        return $this->belongsTo(Procedimiento::class);
    }

    public function oficina()
    {
        return $this->belongsTo(Oficina::class);
    }
}
