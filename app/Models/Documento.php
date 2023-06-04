<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'asunto', 'archivo', 'folio', 'fingreso', 'oficina_id', 'tipo_documento_id'];

    public function Oficina(){
        return $this->belongsTo(Oficina::class);
    }

    public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }
}
