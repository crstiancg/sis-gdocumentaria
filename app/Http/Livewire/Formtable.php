<?php

namespace App\Http\Livewire;

use App\Models\MesaAyuda;
use Livewire\Component;

class Formtable extends Component
{
    public function render()
    {
        return view('livewire.formtable',[
            'documento' => MesaAyuda::all(),
        ]);
    }
}
