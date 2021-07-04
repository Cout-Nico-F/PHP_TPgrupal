<?php

namespace App\Http\Controllers;

class DropDown_CarrerasCursos_Controller extends Controller
{
    //metodo que recibe el array de objetos del dao y lo mapea en un objeto comprensible para la capa view.
    public static function BuscarCarreraController($idAlumno){
        
        $resultados = \App\Models\Consultas::BuscarCarreraDao($idAlumno);

        $row = pg_num_rows($resultados); //Retorna un entero y un -1 en caso de fallo


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

    public static function capturarDatos(){ //Pregunto si existe un dato con el nombre btnAceptar
        if(isset($_GET['btnAceptar'])){    //Una vez que entra pregunto si es un array lo que vino, creo que no es necesario igualmente porque no puedo tirar mensajes de error con Laravel
            if(is_array($_GET['idpagoalumnos'])){
                $id_array = $_GET['idpagoalumnos'];
                return $id_array;
            }
        }
    }

    public static function BuscarIDDeudaController(){
      if(isset($_POST['IDDeuda']))
      {
        if(!empty($_POST['select_carreras']))
        {
          $id = $_POST['select_carreras'];
        } else {
          echo 'No se encontró deuda';
        }
      }
      return $id;
    }

    public static function json_decode_encode($tipo,$IDDeuda){
        switch($tipo){
            case "Carrera":
                return json_decode(json_encode(self::BuscarCarreraController($IDDeuda)), true);
                break;
            case "Deuda":
                json_decode(json_encode(self::BuscarDeudasController($IDDeuda)), true);
                break;
            default:
                return 0;
        }
    }

}
