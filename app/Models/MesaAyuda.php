<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaAyuda extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'asunto', 'archivo', 'folio', 'fingreso', 'estado', 'remitente_id', 'tipo_documento_id'];

    public function Remitente(){
        return $this->belongsTo(Remitente::class);
    }

    public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }
    
}
