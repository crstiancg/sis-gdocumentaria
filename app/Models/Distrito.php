<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // public function provincias()
    // {
    //     return $this->hasMany(Provincia::class);
    // }
}
