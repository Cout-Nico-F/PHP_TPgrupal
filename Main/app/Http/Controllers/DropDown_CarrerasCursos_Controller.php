<?php

namespace App\Http\Controllers;

class DropDown_CarrerasCursos_Controller extends Controller
{
    //metodo que recibe el array de objetos del dao y lo mapea en un objeto comprensible para la capa view.
    public static function BuscarCarreraController($idAlumno){
        
        $resultados = \App\Models\Consultas::BuscarCarreraDao($idAlumno);//este metodo ahora esta en controller pero deberiamos moverlo a una carpeta Dao

        // if($resultados == -1){
        //     //"la consulta trajo mas de un resultado, se esperaba uno"
        //     return -1;
        // }
        // else if($resultados == 0){
        //     //"La consulta carrera no trajo un resultado"
        //     return 0;
        // }
        return $resultados;    
    }

    public static function BuscarDeudasController($idalucarrcurs){
        $resultados = \App\Models\Consultas::BuscarDeudasDao($idalucarrcurs);//este metodo ahora esta en controller pero deberiamos moverlo a una carpeta Dao
        return $resultados;
    }
}
