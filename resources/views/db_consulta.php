    
<?php 
        
    function BuscarCarrera($user){

        include("db.php");  //Aca incluye la conexion a la base de datos

        $consulta_carr = "SELECT alumnos.alum_idalumno,alumnoscarreracurso.alcc_idccalta,alumnoscarreracurso.alcc_idalucarrcurs,
        carrerascursosalta.ccal_descripcion FROM (alumnos INNER JOIN alumnoscarreracurso ON alumnos.alum_idalumno = alumnoscarreracurso.alcc_idalumno)
        INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta = carrerascursosalta.ccal_idccalta WHERE alumnos.alum_idalumno='$user'"; 

        $resultado = pg_query($conn,$consulta_carr) or die("Error en la consulta carreras"); //Esto lo puedo hacer porque pg_query devuelve un boolean

        $row = pg_num_rows($resultado); //Retorna un entero y un -1 en caso de fallo

        if($row == -1){ //Si no trajo nada
            die("La consulta carrera no trajo un resultado");
        }

        pg_close();

        return $resultado;
    }
    
    function BuscarDeuda($idalucarrcurs) {

    include('db.php');

    $consulta_deuda = "SELECT pagoalumnos.paal_idpagoalumno, pagoalumnos.paal_fechadeb,pagoalumnos.paal_tipopago, pagoalumnos.paal_descripcion, pagoalumnos.paal_intereses, pagoalumnos.paal_importecuota,
    carrerascursosalta.ccal_descripcion, pagoalumnos.paal_idalucarrcurs,pagoalumnos.paal_estado, pagoalumnos.paal_importepago,carrerascursosalta.ccal_idcarrcurs FROM (pagoalumnos INNER JOIN 
    alumnoscarreracurso ON pagoalumnos.paal_idalucarrcurs = alumnoscarreracurso.alcc_idalucarrcurs) INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta = carrerascursosalta.ccal_idccalta
    WHERE ((pagoalumnos.paal_idalucarrcurs='$idalucarrcurs') AND (pagoalumnos.paal_estado <>'PAGO')) ORDER BY pagoalumnos.paal_fechadeb"; 

    $resultado = pg_query($conn,$consulta_deuda) or die("Error en la consulta deuda"); //Esto lo puedo hacer porque pg_query devuelve un boolean

    $row = pg_num_rows($resultado); //Retorna un entero y un -1 en caso de fallo

    if($row == -1){ //Si no trajo nada
       die("La consulta deuda no trajo un resultado");
    }

    pg_close();

    return $resultado;  

}
?>
    