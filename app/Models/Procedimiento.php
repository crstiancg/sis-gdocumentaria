<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'respuesta', 'clase_id'];

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }

    public function ayudas()
    {
        return $this->hasMany(MesaAyuda::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
