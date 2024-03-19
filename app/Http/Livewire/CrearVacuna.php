<?php

namespace App\Http\Livewire;

use App\Models\Vacuna;
use Livewire\Component;

class CrearVacuna extends Component
{
    public $nombre;
    public $tipo_user;
    public $tipo;
    public $precio;
    public $edad_desde;
    public $edad_hasta;
    public $genero;
    public $enfermedad;
    public $propagacion;
    public $sintomas;

    //Validaciones formulario crear-vacuna.blade.php
    protected $rules = [
        'nombre' => ['required', 'string'],
        'tipo_user' => ['required', 'in:persona,mascota'],
        'tipo' => ['required', 'in:gratis,pago'],
        'precio' => ['required', 'numeric'],
        'edad_desde' => ['required'],
        'edad_hasta' => ['required'],
        'genero' => ['required', 'in:masculino,femenino,ambos'],
        'enfermedad' => ['required'],
        'propagacion' => ['required'],
        'sintomas' => ['required'],
    ];

    public function mount()
    {
        //Para que funcione el selected en los inputs de tipo select
        $this->tipo_user = ''; // o '' según prefieras
        $this->tipo = '';
        $this->genero = '';
    }


    public function crearVacuna() 
    {
        $datos = $this->validate();

        //Crear la vacuna
        Vacuna::create([
            //'': campos del fillable Vacuna.php.  $datos['']: datos infresados en los inputs
            'nombre' => $datos['nombre'],
            'tipo_user' => $datos['tipo_user'],
            'tipo' => $datos['tipo'],
            'precio' => $datos['precio'],
            'edad_desde' => $datos['edad_desde'],
            'edad_hasta' => $datos['edad_hasta'],
            'genero' => $datos['genero'],
            'enfermedad' => $datos['enfermedad'],
            'propagacion' => $datos['propagacion'],
            'sintomas' => $datos['sintomas'],
            'user_id' => auth()->user()->id,//Pasamos el usuario autenticado (auth()) que crea la vacante
        ]);

        //Mensaje exito
        session()->flash('mensaje', 'Vacuna creada correctamente');

        return redirect()->route('vacunas.index');
    }

    public function render()
    {
        return view('livewire.crear-vacuna');
    }
}
