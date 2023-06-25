<?php

namespace App\Http\Livewire;

use App\Models\MesaAyuda;
use Livewire\Component;
class Formtable extends Component
{
    public $search="";
    public $estado="";
    public function render()
    {
        return view('livewire.formtable',[
        
            'noaceptado' => MesaAyuda::select('*')->where('estado','No Aceptado')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),
            'aceptado' => MesaAyuda::select('*')->where('estado','Aceptado')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),
            'revision' => MesaAyuda::select('*')->where('estado','Revision')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),

        ]);
    }
}
