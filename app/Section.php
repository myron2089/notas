<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Secciones
class Section extends Model
{
    protected $table ='seccion';
    protected $primaryKey= 'CodSeccion';
    public $timestamps = false;


public  function alumnos()
    {

       return $this->belongsToMany('\App\Alumno','asigalumno','Seccion_CodSeccion')
			->withPivot('Seccion_CodSeccion','Carrera_CodCarrera'); 
          

    }


    public function ciclos()
    {
    	return $this->belongsToMany('\App\Ciclo','asigalumno','Seccion_CodSeccion')
            ->withPivot('Alumno_CodAlumno', 'Carrera_CodCarrera');


    }
}