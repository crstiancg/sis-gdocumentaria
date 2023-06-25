<?php

namespace App\Http\Livewire;

use App\Models\MesaAyuda;
use Livewire\Component;
class Formtable extends Component
{
    public $search="";
    public $estado="Revision";
    public function render()
    {
        return view('livewire.formtable',[

            'noaceptado' => MesaAyuda::select('*')->where('estado',$this->estado)->orderby('id','desc')->search("asunto", $this->search)->get(),
            // 'aceptado' => MesaAyuda::select('*')->where('estado','Aceptado')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),
            // 'revision' => MesaAyuda::select('*')->where('estado','Revision')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),

        ]);
    }

    public function revision()
    {
        $this->estado = "Revision";
    }

    public function aceptado()
    {
        $this->estado = "Aceptado";
    }

    public function noaceptado()
    {
        $this->estado = "No aceptado";
    }
}
