<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Encargado;
use App\Alumno;
use App\Ciclo;
use App\Notas;
use App\Section;
use App\StudentAsignation;
use Input;
use DB;
use Auth;

class ScoreController extends Controller
{
    public function setScores(Request $request)
    {

    	$grade = $request->get('grade');
    	$sec = $request->get('section');
    	$cic = $request->get('cicle');
    	$mat = $request->get('mat');
        $carr = $request->get('carr');
        $mat = $request->get('mat');

    	$carreras =   \App\Carrera::All() ->sortBy("Carrera");
        $ciclos =   \App\Ciclo::All() ->sortBy("Ciclo");
        $sections =   \App\Section::All() ->sortBy("Seccion");
        $grados=   DB::table('grado')
                            ->where('Carrera_CodCarrera','=',$carr)
                            ->get();
        $materias = DB::table('materia')
            ->join('asigmateria', 'asigmateria.Materia_CodMateria', '=', 'materia.CodMateria')
            ->join('grado', 'grado.CodGrado', '=', 'asigmateria.Grado_CodGrado')
            ->select('materia.CodMateria', 'materia.Materia')
            ->where('asigmateria.Grado_CodGrado', '=',  $grade)
            ->get();

        $students = DB::table('alumno')
            ->join('asigalumno', 'alumno.CodAlumno', '=', 'asigalumno.Alumno_CodAlumno')
            ->join('ciclo', 'ciclo.CodCiclo', '=', 'asigalumno.Ciclo_CodCiclo')
            ->join('notas', 'notas.AsigAlumno_CodAsignacion', '=', 'asigalumno.CodAsignacion')
            ->select('alumno.CodAlumno', 'alumno.Apellidos', 'alumno.Nombre', 'notas.Nota1', 'notas.Nota2', 'notas.Nota3','notas.Nota4','asigalumno.CodAsignacion')
            ->where('asigalumno.Grado_CodGrado', '=', $grade)
            ->where('asigalumno.Seccion_CodSeccion', '=', $sec)
            ->where('asigalumno.Ciclo_CodCiclo', '=', $cic)
            ->where('notas.Materia_CodMateria', '=', $mat)
            ->get();

        return  view('score/scoreRegister', compact('carreras','sections','ciclos','grados','students', 'materias'));

    }

    //Obtener materia segun  grado
    public function getMateriaByCarrera(Request  $request, $id)
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

    public function saveData(Request $request)
    {
          if($request->ajax())
            {
                

            try
            {



        /*   $result = \App\Notas::where('AsigAlumno_CodAsignacion',$request['casig'] )
            ->where('Materia_CodMateria',$request['cmat'] )
            ->where('Ciclo_CodCiclo',$request['ciclo'] )
            
            ->update(['Nota1' => $request['score']]);
            
            return $result;
*/

         $results=   DB::table('notas')
        ->where('AsigAlumno_CodAsignacion',$request['casig'])  // find your user by their email
        ->where('Materia_CodMateria',$request['cmat'] )
        ->where('Ciclo_CodCiclo',$request['ciclo'] )
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('Nota'.$request['bim'] =>$request['score']));

       // $su = $results->toSql();
   /*
        $results = \App\Notas::where('AsigAlumno_CodAsignacion',$request['casig'])
                             ->where('Materia_CodMateria',$request['cmat'] )
                             ->where('Ciclo_CodCiclo',$request['ciclo'] )
                             ->update(array('Nota1' => $request['score']))
        ;  // update the record in the DB
            */
          $su = DB::getQueryLog();
            if($results>0)
            {
            return "Nota actualizada";
            }
            else
            {
                return "No se ha actualizado" . $su ;
            }

            /* "Editando.....".$request['bim'] . " Ciclo: " . $request['ciclo'] . " ". $request['score']. " Asignacion: " . $request['casig'] . " Materia: " .$request['casig'] . " Nota: ". 'Nota'.$request['bim'];*/
            }
            catch(Exception $e)
            {
                return($e->getMessase());
            }
            }


    }

    //Mostrar Los alumnos asignados a los grados para ingresar las notas

    //IMPRIMIR LAS NOTASs
    public function printScores(Request $request)
    {
       $casig = $request->get('asig');

       //CONSULTAR LA TABLA


        $scores = DB::table('notas')
            ->join('asigalumno', 'asigalumno.CodAsignacion', '=', 'notas.AsigAlumno_CodAsignacion')
            ->join('alumno', 'alumno.CodAlumno', '=', 'asigalumno.Alumno_CodAlumno')
            ->join('ciclo', 'ciclo.CodCiclo', '=', 'asigalumno.Ciclo_CodCiclo')
            ->join('seccion', 'seccion.CodSeccion', '=', 'asigalumno.Seccion_CodSeccion')
            ->join('grado', 'grado.CodGrado', '=', 'asigalumno.Grado_CodGrado')
            ->join('carrera', 'carrera.CodCarrera', '=', 'grado.Carrera_CodCarrera')
            ->join('materia', 'materia.CodMateria', '=', 'notas.Materia_CodMateria')
            ->select('alumno.CodAlumno', 'alumno.Apellidos', 'alumno.Nombre', 
                     'grado.Grado', 'seccion.Seccion', 'ciclo.Ciclo','alumno.CodPer','carrera.Carrera', 
                     'seccion.Seccion',
                     'notas.Nota1', 'notas.Nota2', 'notas.Nota3', 'notas.Nota4')
            ->where('asigalumno.CodAsignacion', '=',  $casig)
            ->get();

      /* select CONCAT(A.Nombre , A.Apellidos), MAT.MATERIA, N.NOTA1, N.NOTA2, N.NOTA3, N.NOTA4 FROM ALUMNO AS A INNER JOIN ASIGALUMNO AS ASI ON ASI.ALUMNO_CODALUMNO = A.CODALUMNO INNER JOIN NOTAS AS N ON N.ASIGALUMNO_CODASIGNACION = ASI.CODASIGNACION INNER JOIN MATERIA AS MAT ON MAT.CODMATERIA = N.MATERIA_CODMATERIA*/


       $asina = StudentAsignation::where('CodAsignacion' ,'=', $casig)
                                    ->join('alumno','alumno.CodAlumno', '=', 'Alumno_CodAlumno')
                                    ->join('grado','grado.CodGrado', '=', 'asigalumno.Grado_CodGrado')
                                    ->join('carrera','carrera.CodCarrera', '=', 'grado.Carrera_CodCarrera')
                                    ->join('seccion','seccion.CodSeccion', '=', 'asigalumno.Seccion_CodSeccion')
                                    ->get();
     //    $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('score/printCard', compact('asina'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');   
       //dd($casig);
    }

    
}