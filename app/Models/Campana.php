<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campana extends Model
{
    use HasFactory;

     //Poniendo ultimo_dia a tipo date para poderlo formatear en las vistas
    protected $casts = ['fecha'=> 'date'];

    protected $fillable = [
        'titulo',
        'fecha',
        'hora_desde',
        'hora_hasta',
        'departamento',
        'municipio',
        'direccion',
        'empresa',
        'imagen',
        'descripcion',
        'user_id',
        'vacuna_id',
    ];

    //Usando relaciones de eloquent. Es similar a un JOIN en el sentido que nos permite acceder a datos relacionados
    //de otro modelo, pero a nivel de consulta SQL no es un JOIN

    //Generando relaciones para desde las vistas de campaña tener acceso a todas las columnas de las vacunas
    //belongsTo: una Campaña pertenece a una unica vacuna
    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class);
    }

    //hasMany(): una campaña tiene (o pertenece) a muchos inscritos
    public function inscritos()
    {
        // return $this->hasMany(Inscrito::class)->orderBy('created_at', 'DESC');
        return $this->hasMany(Inscrito::class);
    }
}
