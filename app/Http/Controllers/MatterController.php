<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Encargado;
use App\Alumno;
use App\Ciclo;
use App\Grado;
use App\Carrera;
use Input;
use DB;
use Auth;

class MatterController extends Controller
{
    public function getMatters()
    {
    //	$carreras = Carrera::with('Grado')->get();
	$carreras = Carrera::All();
	$grados = Grado::All();
    	
    	return view('matter/matterhome', compact('carreras', 'grados'));

    }

    public function getMatterById(Request  $request,$id)
    {
    	if($request->ajax())
        {
        
        $materias = DB::table('materia')
            ->join('asigmateria', 'asigmateria.Materia_CodMateria', '=', 'materia.CodMateria')
            ->join('grado', 'grado.CodGrado', '=', 'asigmateria.Grado_CodGrado')
            ->select('materia.CodMateria', 'materia.Materia')
            ->where('asigmateria.Grado_CodGrado', '=',  $id)
            ->get();
        return $materias;
    }

    }
}