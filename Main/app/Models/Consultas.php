<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consultas extends Model
{
    use HasFactory;

    public static function BuscarCarreraDao($user){

        //$conn = pg_connect("host=localhost port=5432 dbname=db_ps user=postgres password=root") or die("Error de conexion: ". pg_last_error());//TODO: no olvidar el die

        $consulta_carr = "SELECT alumnos.alum_idalumno,alumnoscarreracurso.alcc_idccalta,alumnoscarreracurso.alcc_idalucarrcurs,
        carrerascursosalta.ccal_descripcion FROM (alumnos INNER JOIN alumnoscarreracurso ON alumnos.alum_idalumno = alumnoscarreracurso.alcc_idalumno)
        INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta = carrerascursosalta.ccal_idccalta WHERE alumnos.alum_idalumno='$user'"; 

        $resultado =  DB::select($consulta_carr);

        
        //$resultado = pg_query($conn,$consulta_carr) or die("Error en la consulta carreras"); //Esto lo puedo hacer porque pg_query devuelve un boolean
        
        //pg_close();
        return $resultado;//TODO: cuidado aca. este casteo esta ok?
    }

    public static function BuscarDeudasDao($idalucarrcurs){

        //$conn = pg_connect("host=localhost port=5432 dbname=db_ps user=postgres password=root") or die("Error de conexion: ". pg_last_error());//TODO: no olvidar el die

        $consulta_deuda = "SELECT pagoalumnos.paal_idpagoalumno, pagoalumnos.paal_fechadeb,pagoalumnos.paal_tipopago, pagoalumnos.paal_descripcion, pagoalumnos.paal_intereses, pagoalumnos.paal_importecuota,
        carrerascursosalta.ccal_descripcion, pagoalumnos.paal_idalucarrcurs,pagoalumnos.paal_estado, pagoalumnos.paal_importepago,carrerascursosalta.ccal_idcarrcurs FROM (pagoalumnos INNER JOIN 
        alumnoscarreracurso ON pagoalumnos.paal_idalucarrcurs = alumnoscarreracurso.alcc_idalucarrcurs) INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta = carrerascursosalta.ccal_idccalta
        WHERE ((pagoalumnos.paal_idalucarrcurs='$idalucarrcurs') AND (pagoalumnos.paal_estado <>'PAGO')) ORDER BY pagoalumnos.paal_fechadeb";

        //$resultado = pg_query($conn,$consulta_deuda) or die("Error en la consulta deuda"); //Esto lo puedo hacer porque pg_query devuelve un boolean

        $resultado = DB::select($consulta_deuda);
        
        //pg_close();
        return $resultado;  
    }

}