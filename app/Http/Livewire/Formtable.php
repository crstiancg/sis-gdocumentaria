<?php

namespace App\Http\Livewire;

use App\Models\MesaAyuda;
use Livewire\Component;
use Livewire\WithPagination;

class Formtable extends Component
{
    public $search="";
    public $estado = "Revision";
    public $sortField;
    public $sortDirection = 'ASC';
    // use WithPagination;

    public function sortBy($field)
    {
        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.formtable',[

            'noaceptado' => MesaAyuda::select('*')->where('estado',$this->estado)->search("asunto", $this->search)->paginate(10),
            // 'aceptado' => MesaAyuda::select('*')->where('estado','Aceptado')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),
            // 'revision' => MesaAyuda::select('*')->where('estado','Revision')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),

        ]);
    }

    public function revision($status)
    {
        $this->estado = $status;
    }
    public function aceptado($status)
    {
        $this->estado = $status;
    }
    public function noaceptado($status)
    {
        $this->estado = $status;
    }
    
}
