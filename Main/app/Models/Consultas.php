<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;

class Consultas extends Model
{
    use HasFactory;

    public static function BuscarCarreraDao($user){
        $resultados = Facades\DB::select("SELECT alumnos.alum_idalumno,alumnoscarreracurso.alcc_idccalta,alumnoscarreracurso.alcc_idalucarrcurs,
        carrerascursosalta.ccal_descripcion FROM (alumnos INNER JOIN alumnoscarreracurso ON alumnos.alum_idalumno = alumnoscarreracurso.alcc_idalumno)
        INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta = carrerascursosalta.ccal_idccalta WHERE alumnos.alum_idalumno='$user'" ) ; 

        if(count($resultados) == 0){
            //"La consulta carrera no trajo un resultado"
            return 0;
        }
        else if(count($resultados) > 1){
            //"la consulta trajo mas de un resultado, se esperaba uno"
            return -1;
        }
        //"consulta exitosa"
        return $resultados;
    }
    
    public static function BuscarDeuda($idalucarrcurs) {

    $resultados = Facades\DB::select("SELECT pagoalumnos.paal_idpagoalumno, pagoalumnos.paal_fechadeb,pagoalumnos.paal_tipopago, pagoalumnos.paal_descripcion, pagoalumnos.paal_intereses, pagoalumnos.paal_importecuota,
    carrerascursosalta.ccal_descripcion, pagoalumnos.paal_idalucarrcurs,pagoalumnos.paal_estado, pagoalumnos.paal_importepago,carrerascursosalta.ccal_idcarrcurs FROM (pagoalumnos INNER JOIN 
    alumnoscarreracurso ON pagoalumnos.paal_idalucarrcurs = alumnoscarreracurso.alcc_idalucarrcurs) INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta = carrerascursosalta.ccal_idccalta
    WHERE ((pagoalumnos.paal_idalucarrcurs='$idalucarrcurs') AND (pagoalumnos.paal_estado <>'PAGO')) ORDER BY pagoalumnos.paal_fechadeb"); 

    if(count($resultados) == 0){
        //"La consulta carrera no trajo un resultado"
        return 0;
    }
    else if(count($resultados) > 1){
        //"la consulta trajo mas de un resultado, se esperaba uno"
        return -1;
    }
    //"consulta exitosa"
    return $resultados;
 }
}
