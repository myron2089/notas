<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAsignation extends Model
{
    protected $table ='asigalumno';

    protected $primaryKey= 'CodAsignacion';
	    
    public $timestamps = false;

	//Obtener todos los alumnos

    //Obtener las calificaciones con su clase por bimestre
     public function notas(){
    	return $this->hasMany(Notas::class,'AsigAlumno_CodAsignacion')
    				->join('materia', 'materia.CodMateria', '=', 'Materia_CodMateria')
    				->select('Nota1', 'Nota2', 'Nota3', 'Nota4', 'materia.Materia')
    				;

    }

    

}