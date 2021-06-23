<?php

namespace App\Http\Controllers;

class DropDown_CarrerasCursos_Controller extends Controller
{
    //metodo que recibe el array de objetos del dao y lo mapea en un objeto comprensible para la capa view.
    public static function BuscarCarreraController($idAlumno){
        
        $resultados = \App\Models\Consultas::BuscarCarreraDao($idAlumno);

        $affectedRows = pg_num_rows($resultados);
        
        if($affectedRows == -1) {
            //Vemos de mostrar al usuario que no hay coincidencia, die no es recomendado ya que funciona como exit
        } 

        //IMPORTANTE: Agregué el package laravelcollective que ayuda mucho con forms y html. Básicamente toda la parte front
        //Dejo el link con la documentación, así nos es más sencillo: https://laravelcollective.com/docs/6.x/html

        /*if($row == -1){ //Si no trajo nada
            die("La consulta carrera no trajo un resultado");//TODO: die
        }*/

        //TODO: No nos piden validaciones pero podriamos hacerlas para que no quede vacia esta parte
        
        return $resultados;    
    }

    public static function BuscarDeudasController($idalucarrcurs){
        $resultados = \App\Models\Consultas::BuscarDeudasDao($idalucarrcurs);

        /*$row = pg_num_rows($resultados); //Retorna un entero y un -1 en caso de fallo
        if($row == -1){ //Si no trajo nada
           die("La consulta deuda no trajo un resultado");
        }*/

        return $resultados;
    }
}
