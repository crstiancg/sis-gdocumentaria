<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    // protected $fillable = ['nombre', 'provincia_id'];

    // public function provincia()
    // {
    //     return $this->belongsTo(Provincia::class);
    // }

    // public function remitentes()
    // {
    //     return $this->hasMany(Remitente::class);
    // }
}
