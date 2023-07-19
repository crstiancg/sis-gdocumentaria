<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    use HasFactory;

    public function incremento()
    {
        $contador = Documento::latest()->first()->numero??null;
        if($contador==null){
            return 1;
        }else{
            return $contador = $contador + 1;
        }

        // return $contador;
    }

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
        'estado',
        'tipo_documento_id',
        'procedimiento_id',
        'indicacion_id',
        'remitente_id',
        'user_id',
        'derivar_documento_id'
    ];


    public function oficina(){
        return $this->belongsTo(Oficina::class);
    }

    public function derivar_documento(){
        return $this->belongsTo(DerivarDocumento::class);
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
