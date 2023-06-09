<?php

namespace App\Http\Livewire;

use App\Models\MesaAyuda;
use Livewire\Component;
use Livewire\WithPagination;

class Formtable extends Component
{
    public $search = "";
    // public $estado = "Revision";
    public $sortField;
    public $sortDirection = 'ASC';
    // use WithPagination;

    public function sortBy($field)
    {
        $this->sortField = $field;
    }
    public $searchResult;

    public function buscarAsunto()
    {
        //$this->searchResult = MesaAyuda::where('asunto', $this->search)->get();


        /* $this->searchResult = MesaAyuda::where(function ($query) {
             $query->where('asunto', 'LIKE', '%' . $this->search . '%')
                 ->orWhere('numero', 'LIKE', '%' . $this->search . '%');
         })
             ->get();*/

        $this->searchResult = MesaAyuda::where(function ($query) {
            $query->where('asunto', $this->search)
                ->orWhere('numero', $this->search);
        })
            ->get();

    }

    public function render()
    {
        return view('livewire.formtable', [

            'noaceptado' => MesaAyuda::select('*')->search("asunto", $this->search)->get(),
            // 'aceptado' => MesaAyuda::select('*')->where('estado','Aceptado')->orderby('id','desc')->search("asunto", $this->search)->paginate(1) ---->where('estado',$this->estado),
            // 'revision' => MesaAyuda::select('*')->where('estado','Revision')->orderby('id','desc')->search("asunto", $this->search)->paginate(1),

        ]);
    }

    // public function revision($status)
    // {
    //     $this->estado = $status;
    // }
    // public function aceptado($status)
    // {
    //     $this->estado = $status;
    // }
    // public function noaceptado($status)
    // {
    //     $this->estado = $status;
    // }

}
