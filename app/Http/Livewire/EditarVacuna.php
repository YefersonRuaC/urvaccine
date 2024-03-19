<?php

namespace App\Http\Livewire;

use App\Models\Vacuna;
use Livewire\Component;

class EditarVacuna extends Component
{
    //public $id es reservado de livewire, asi que usamos $vacuna_id
    public $vacuna_id;
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

    //mount: Cuando el componente haya sido instanciado y solamente se ejecuta una vez (util para actualizar)
    public function mount(Vacuna $vacuna) //En este punto la vrble $vacuna tiene la info de la BD gracias al instanciar el model
    {
        //$this->nombre: son los nuevos datos. $vacuna->nombre son los de la BD
        $this->vacuna_id = $vacuna->id;
        $this->nombre = $vacuna->nombre;
        $this->tipo_user = $vacuna->tipo_user;
        $this->tipo = $vacuna->tipo;
        $this->precio = $vacuna->precio;
        $this->edad_desde = $vacuna->edad_desde;
        $this->edad_hasta = $vacuna->edad_hasta;
        $this->genero = $vacuna->genero;
        $this->enfermedad = $vacuna->enfermedad;
        $this->propagacion = $vacuna->propagacion;
        $this->sintomas = $vacuna->sintomas;
    }

    public function editarVacuna() 
    {
        //$datos contendra los valores del form, una vez pase las validaciones
        $datos = $this->validate();

        //Encontrando la vacuna a editar por medio de su id
        $vacuna = Vacuna::find($this->vacuna_id);

        //Asignamos los nuevos valores para ser puestos en la BD
        $vacuna->nombre = $datos['nombre'];
        $vacuna->tipo_user = $datos['tipo_user'];
        $vacuna->tipo = $datos['tipo'];
        $vacuna->precio = $datos['precio'];
        $vacuna->edad_desde = $datos['edad_desde'];
        $vacuna->edad_hasta = $datos['edad_hasta'];
        $vacuna->genero = $datos['genero'];
        $vacuna->enfermedad = $datos['enfermedad'];
        $vacuna->propagacion = $datos['propagacion'];
        $vacuna->sintomas = $datos['sintomas'];

        //Actualizamos la vacuna
        $vacuna->save();

        session()->flash('mensaje', 'Vacuna actualizada correctamente');

        return redirect()->route('vacunas.index');
    }

    public function render()
    {
        return view('livewire.editar-vacuna');
    }
}
