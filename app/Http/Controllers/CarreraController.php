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

class CarreraController extends Controller
{
    public function getGrados(Request  $request, $id)
    {
    	if($request->ajax())
    	{
    		$grados = \App\Grado::grados($id);
    		return response()->json($grados);

    	}

    }
}