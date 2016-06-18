<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grado;

class Carrera extends Model
{
    protected $table ='carrera';
    public $timestamps = false;
    protected $primaryKey = 'CodCarrera';

    public function grado(){
    	return $this->hasMany(Grado::class,'Carrera_CodCarrera');

    }
}

