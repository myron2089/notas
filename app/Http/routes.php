<?php
use App\Encargado;
use App\Alumno;
use App\StudentAsignation;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/regst','AlumnoController@regal');
Route::get('grados/{id}', 'CarreraController@getGrados');
Route::get('sections/{id}', 'GradeController@getSections');

Route::post('/savedata', array('as' =>'saveInfo', 'uses'=>'AlumnoController@savedata'));
Route::post('/editdata', array('as' =>'saveInfo', 'uses'=>'AlumnoController@editdata'));

Route::get('/getst', 'AlumnoController@getStudents');

Route::get('/getstbyid/{id}', 'AlumnoController@getStudentById');

//Encargados
//Crear Nuevo     
Route::get('/regmand','EncargadoController@regMandated');
Route::post('/saveMandated', array('as' =>'saveInfo', 'uses'=>'EncargadoController@saveData'));
//Reporte
Route::get('/getenc','EncargadoController@getEncargados');

//Notas
//Ingresar Notas
Route::get('/setscore', 'ScoreController@setScores');
//Ajax para obtener a los alumnos
Route::get('/getStudentsBygrade', array('as' =>'saveInfo', 'uses' => 'ScoreController@getStudentstoScore'));

//Ajax para guardar las notas
Route::post('/saveScores', array('as' =>'saveInfo', 'uses'=>'ScoreController@saveData'));

//IMPRIMIR NOTAS
Route::get('/printc', 'ScoreController@printScores');



//MATERIAS
Route::get('/homemats', 'MatterController@getMatters');

//Obtener Materias segun Grado seleccionado

Route::get('/getmatbygra/{id}', 'MatterController@getMatterById');
//Generar materias segun codigo de grado
Route::get('materias/{id}', 'ScoreController@getMateriaByCarrera');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');
 
});


//Route::get('/register', 'HomeController@register');
