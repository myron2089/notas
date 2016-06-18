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

class AlumnoController extends Controller
{

    public function editst(){
        return "HAWAI";
    }


    public function regal()
    {
        $encargados =   \App\Encargado::All() ->sortBy("Nombre");
        $carreras =   \App\Carrera::All() ->sortBy("Carrera");
        $ciclos =   \App\Ciclo::All() ->sortBy("Ciclo");
        $sections =   \App\Section::All() ->sortBy("Seccion");

        $grados=   \App\Grado::All() ->sortBy("Grado");
        return view('person/registerperson', compact('encargados','carreras','sections','ciclos'), ['person' => 'student']);
    }

    public function savedata(Request $request)
    {

        if($request->ajax())
         {
             
 
       
      
       // return "Hola mundo";



               /*SELECCIONAR EL ID MAS ALTO PARA GENERAR EL SIGUIENTE*/
            $maxcod = \App\Alumno::All() ->max('CodAlumno');
            $sigcod = $maxcod + 1;

            $year = date("Y");
            $codciclo = DB::table('ciclo')->where("Ciclo", $year)->pluck('CodCiclo');


        
            $st="";

           // $data = $request->all();

            if($request->ajax())
            {
                    try {
                              //DATOS DEL ALUMNO
                            $data  = array(
                                        'CodAlumno' =>  $sigcod,
                                        'Nombre' =>  $request['fname'],
                                        'Apellidos' =>  $request['lname'], 
                                        'Sexo' =>  $request['sex'],
                                        'FechaNac' =>  $request['born'],
                                        'CodPer' =>  $request['personalc'],
                                        'Direccion' =>  $request['address'],
                                        'Telefono' =>  $request['phone'],
                                        'Encargado_CodEncargado' => $request['encargado'],
                                        'Ciclo_CodCiclo'=>$codciclo[0],
                                        'Usuario'=>Auth::user()->name,
                                        'Fecha' => date("Y-m-d"),
                                        );

                            $check = DB::table('alumno')->insert($data);
                            if($check > 0)
                            {
                                //DATOS DE LA ASIGNACION
                                $maxasig = \App\StudentAsignation::All() ->max('CodAsignacion');
                                $sigasig = $maxasig + 1;

                                $data_asig = array(
                                                   'Grado_CodGrado' => $request['grade'],
                                                   'Seccion_CodSeccion' => $request['section'],
                                                   'Alumno_CodAlumno' => $sigcod,
                                                   'CodAsignacion' => $sigasig,
                                                   'Usuario'=>Auth::user()->name,
                                                   'Ciclo_CodCiclo'=>$codciclo[0],
                                                   'Fecha' => date("Y-m-d"),
                                                   );

                                $checkasig = DB::table('asigalumno')->insert($data_asig);
                                $ccar = $request['carr'];
                                //Continuar con las notas
                                if($checkasig > 0)
                                {
                                  //Obtener las materias de la carreara a la que se ha asignado
                                   $codMaterias = DB::table('materia')
                                                     ->join('asigmateria', 'asigmateria.Materia_CodMateria', '=', 'Materia.CodMateria')
                                                     ->join('grado', 'grado.CodGrado', '=', 'asigmateria.grado_CodGrado')
                                                     ->join('Carrera', 'Carrera.CodCarrera', '=', 'Grado.Carrera_CodCarrera')
                                                     ->where('Carrera.CodCarrera','=', $ccar)
                                                     ->where('Grado.CodGrado','=', $request['grade'])
                                                     ->pluck('Materia.CodMateria');
                                    //Obtener el Ciclo
                                    $codCiclo = DB::table('Ciclo')
                                                    ->where('Ciclo',date("Y"))
                                                    ->pluck('CodCiclo');


                                                    $coca = $request['grade'];
                                                  
                                 $band=1;
                            
                                    //Insertar en la tabla Notas
                                  foreach ($codMaterias as $mats) {
                                       # code...
                                   
                                    $notas_asig = array(
                                                   'Nota1' => 0,
                                                   'Nota2' => 0,
                                                   'Nota3' => 0,
                                                   'Nota4' => 0,
                                                   'Materia_CodMateria'=>$mats,
                                                   'Ciclo_CodCiclo'=>$codCiclo[0],
                                                   'AsigAlumno_CodAsignacion'=>$sigasig,
                                                   'Usuario'=>Auth::user()->name,
                                                   'Fecha' => date("Y-m-d"),
                                                   );

                                    $checknotas = DB::table('notas')->insert($notas_asig);
                                    $band++;
                                    }
                                    return "Alumno Ingresado con éxito";

                            } //Check 2
                            else
                                {
                                    return "Ha ocurrido un error";
                                }
                                
                           } //Check1
                           else
                            {

                             return "ERROR GRAVE!";
                            
                            }

                             
                                   

                    } //try
                    catch(Exception $e)
                    {
                        return($e->getMessage());
                    }
        } //if request ajax

}
    }


/*EDITAR DATOS DEL ESTUDIANTE*/
    public function editdata(Request $request)
    {
        if($request->ajax())
            {
                return "Editando.....".$request['ids'];
            }


    }


    /* GENERAR LISTADO DE ALUMNOS */
    public function getStudents2()
    {
        $carreras =   \App\Carrera::All() ->sortBy("Carrera");
        $students=   \App\Alumno::All() ->sortBy("Apellidos");
        return view('person/getStudents', compact('students','carreras'));
    }

     public function getStudents(Request $request)
    {
       $name = $request->get('name');
       $carr = $request->get('carrera');
       $ciclo = $request->get('ciclo');
        $sections =   \App\Section::All() ->sortBy("Seccion");
        $encargados =   \App\Encargado::All() ->sortBy("Nombre");
       
        $ciclos =   \App\Ciclo::All() ->sortBy("Ciclo");

       $carreras =   \App\Carrera::All() ->sortBy("Carrera");
       $students = DB::table('alumno')
            ->join('asigalumno', 'alumno.CodAlumno', '=', 'asigalumno.Alumno_CodAlumno')
            ->join('ciclo', 'ciclo.CodCiclo', '=', 'asigalumno.Ciclo_CodCiclo')
            ->join('seccion', 'seccion.CodSeccion', '=', 'asigalumno.Seccion_CodSeccion')
            ->join('grado', 'grado.CodGrado', '=', 'asigalumno.Grado_CodGrado')
            ->select('alumno.CodAlumno', 'alumno.Apellidos', 'alumno.Nombre', 'grado.Grado', 'seccion.Seccion', 'ciclo.Ciclo')
            ->where('alumno.Nombre', 'like', '%'. $name .'%');
            if($carr!=0)
            {
            $students = $students ->where('grado.Carrera_CodCarrera', '=', $carr);
            }
            if($ciclo!=0)
            {
             $students = $students->where('ciclo.CodCiclo', '=', $ciclo);
            }
            $students = $students->get();
        return view('person/getStudents', compact('students','carreras','ciclos','sections', 'encargados'));
    }


    public function getStudentById(Request  $request,$id)
    {
        if($request->ajax())
        {
        
        $students = DB::table('alumno')
            ->join('asigalumno', 'alumno.CodAlumno', '=', 'asigalumno.Alumno_CodAlumno')
            ->join('ciclo', 'ciclo.CodCiclo', '=', 'asigalumno.Ciclo_CodCiclo')
            ->join('seccion', 'seccion.CodSeccion', '=', 'asigalumno.Seccion_CodSeccion')
            ->join('grado', 'grado.CodGrado', '=', 'asigalumno.Grado_CodGrado')
            ->join('carrera', 'carrera.CodCarrera', '=', 'grado.Carrera_CodCarrera')
            ->select('alumno.CodAlumno', 'alumno.Apellidos', 'alumno.Nombre', 
                     'grado.Grado', 'seccion.Seccion', 'ciclo.Ciclo', 'alumno.Direccion',
                     'alumno.Sexo', 'alumno.FechaNac', 'alumno.CodPer', 'alumno.Telefono',
                     'asigalumno.Grado_CodGrado', 'asigalumno.Seccion_CodSeccion', 'carrera.CodCarrera',
                     'carrera.Carrera', 'seccion.Seccion', 'grado.Grado','alumno.Encargado_CodEncargado')
            ->where('alumno.CodAlumno', '=',  $id)
            ->get();
        return $students;
    }
    }


    
}
