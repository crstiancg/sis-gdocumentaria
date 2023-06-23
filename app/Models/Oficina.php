<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function Documento(){
        return $this->hasMany(Documento::class);
    }
}