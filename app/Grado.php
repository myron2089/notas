<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table ='grado';
    public $timestamps = false;
    protected $primaryKey = 'CodGrado';


    //Obtener grados segun carrera
    public static function grados($id_carrera)
    {
    	return Grado::where('Carrera_CodCarrera', '=', $id_carrera)->get();
    }


/*
    public function carrera()
    {
    	  return $this->belongsTo(Carrera::class);
    }

    */

      public function materia(){
    	return $this->hasMany(Grado::class,'Carrera_CodCarrera');

    } 
}