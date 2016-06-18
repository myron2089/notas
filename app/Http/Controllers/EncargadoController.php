<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Encargado;
use App\Alumno;
use App\Ciclo;
use App\Section;
use App\StudentAsignation;
use Input;
use DB;
use Auth;

class EncargadoController extends Controller
{
	public function regMandated()
	{

		return view('person/registerperson', ['person' => 'mandated']);
	}

	public function saveData(Request $request)
	{

		 /*SELECCIONAR EL ID MAS ALTO PARA GENERAR EL SIGUIENTE*/
        $maxcod = \App\Encargado::All() ->max('CodEncargado');
        $sigcod = $maxcod + 1;
		$encargados = DB::select('CALL adminencargado(?,?,?,?,?,?,?,?)',
						   array($sigcod,$request['fname'],$request['phone'],$request['dpi'],$request['address'],
						   	     $request['nit'],1,''));
		
		return $encargados;
	}
	public function getEncargados()
	{

		$encargados = DB::select('CALL adminencargado(?,?,?,?,?,?,?,?)',array(1,'','','','','',2,''));
		return view('person/getEncargados', compact('encargados'));

	}

 


}
