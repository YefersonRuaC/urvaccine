<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inscrito;

class MostrarHistoriales extends Component
{
    public function render()
    {
        // $historiales = Inscrito::all();

        // Obtén los registros de la tabla Inscrito donde asistio es igual a 1
        $historiales = Inscrito::where('user_id', auth()->user()->id)
                                ->where('asistio', 1)
                                ->get();
        
        // $historiales = Inscrito::whereHas('', function ($query) {
        //     //$query hace la consulta a la relacion. Y especificamos el campo y el valor que debera tener ese mismo
        //         $query->where('asistio', 1);
        //     })->get();
        // dd($historicos);
        
        return view('livewire.mostrar-historiales', [
            'historiales' => $historiales
        ]);
    }
}
