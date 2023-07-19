<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'area_id'];

    public function documentos(){
        return $this->hasMany(Documento::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function ayudas()
    {
        return $this->hasMany(MesaAyuda::class);
    }
    public function user(){
        return $this->hasMany(Documento::class);
    }

}
