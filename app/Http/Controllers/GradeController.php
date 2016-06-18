<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Encargado;
use App\Alumno;
use App\Ciclo;
use App\Grados;
use Input;
use DB;
use Auth;

class GradeController extends Controller
{
    public function getSections(Request  $request, $id)
    {
    	if($request->ajax())
    	{
    		$sections = \App\Section::sections($id);
    		return response()->json($sections);

    	}

    }
}