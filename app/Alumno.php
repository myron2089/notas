<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StudentAsignation;
class Alumno extends Model
{
    protected $table ='alumno';
    protected $primaryKey= 'CodAlumno';
    public $timestamps = false;


    public function scoopeName($query, $name)
    {
    	$query->where('Nombre', $name);
    }


     public function asigalumno(){

     	
    	return $this->hasMany(StudentAsignation::class,'Alumno_CodAlumno');

    }

    
}