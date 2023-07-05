<?php

namespace App\Http\Controllers;

use App\Models\MesaAyuda;
use App\Models\Oficina;
use App\Models\Procedimiento;
use App\Models\Remitente;
use App\Models\TipoDocumento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AyudaController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        $tipo = TipoDocumento::all();
        $oficina = Oficina::all();
        // $procedimiento = Procedimiento::all();
        // dump($tipo, $oficina, $procedimiento);
        return view('ayuda', compact('tipo', 'oficina'));
    }

    
    public function store(Request $request)
    {
        $request->validate(MesaAyuda::$rule);

        $remitente = new Remitente();
        $remitente->dni =$request->dni;
        $remitente->nombre =$request->nombre;
        $remitente->paterno =$request->paterno;
        $remitente->materno =$request->materno;
        $remitente->correo =$request->correo;
        $remitente->celular =$request->celular;
        $remitente->razonsocial =$request->razonsocial;
        $remitente->tipo_persona_id =$request->tipo_persona_id;
        
        $remitente->save();

        $ayuda = new MesaAyuda();

        $archivo = Storage::disk('public')->put($ayuda->archivo, $request->archivo);
        // $url = Storage::url($archivo);
        // $estado = "Revision";
        $ayuda->numero = $request->numero;
        $ayuda->asunto = $request->asunto;
        $ayuda->folio = $request->folio;
        $ayuda->fingreso = Carbon::now();
        // $ayuda->estado = $estado;
        $ayuda->archivo = $archivo;
        $ayuda->remitente_id = $remitente->id;
        $ayuda->tipo_documento_id = $request->tipo_documento;
        $ayuda->oficina_id = $request->oficina_id;
        // $ayuda->procedimiento_id = $request->procedimiento_id;
        
        $ayuda->save();

        return redirect()->back()->with('enviarform_', 'ok');
        
      
    }
}
