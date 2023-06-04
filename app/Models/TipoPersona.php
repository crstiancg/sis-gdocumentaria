<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function Remitente(){
        return $this->hasMany(Remitente::class);
    }
}
