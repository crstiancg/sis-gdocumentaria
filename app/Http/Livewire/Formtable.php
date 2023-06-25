<?php

namespace App\Http\Livewire;

use App\Models\MesaAyuda;
use Livewire\Component;
class Formtable extends Component
{
    public $search="";
    
    public function render()
    {
        return view('livewire.formtable',[
        
            'documento' => MesaAyuda::search("asunto", $this->search)->paginate(10),

        ]);
    }
}
