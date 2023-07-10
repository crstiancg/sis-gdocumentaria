<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'asunto',
        'archivo',
        'folio',
        'ntramite',
        'fingreso',
        'fechadoc',
        'observacion',
        'respuesta',
        'oficina_id',
        'tipo_documento_id',
        'procedimiento_id',
        'indicacion_id',
        'remitente_id',
        'user_id'
    ];

    public function oficina(){
        return $this->belongsTo(Oficina::class);
    }

    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function procedimiento()
    {
        return $this->belongsTo(Procedimiento::class);
    }

    public function indicacion()
    {
        return $this->belongsTo(Indicacion::class);
    }

    public function remitente()
    {
        return $this->belongsTo(Remitente::class);
    }
}
