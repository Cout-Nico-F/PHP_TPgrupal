<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno_Model extends Model
{
    use HasFactory;

    private $idAlumno;

    public function getIdAlumno(){
        return $this->idAlumno;
    }
    
    public function setIdAlumno($idAlumnoMod){
        $this->idAlumno = $idAlumnoMod;
    }

}
