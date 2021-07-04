<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d749d06842.js" crossorigin="anonymous"></script>
    <title>View Dropdown</title>
</head>
<body>
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .main-container{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .main-container h2{
            margin: 0 0 80px 0;
            color: #8373e6;
            font-size: 30px;
            font-family: "Raleway", sans-serif;
            font-weight: 400;
        }
        .radio-buttons{
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }
        .custom-radio input{
            display: none;
        }
        .radio-btn{
            margin: 10px;
            width: 180px;
            height: 200px;
            border: 3px solid transparent;
            display: inline-block;
            border-radius: 10px;
            position: relative;
            text-align: center;
            box-shadow: 0 0 20px #c3c3c367;
            cursor: pointer;
        }
        .radio-btn > i{
            color: #ffffff;
            background-color: #8373e6;
            font-size: 20px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 50px;
            padding: 3px;
            transition: 0.2s;
            pointer-events: none;
        }
        .radio-btn .hobbies-icon{
            width: 80px;
            height: 80px;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .radio-btn .hobbies-icon i{
            color: #8373e6;
            line-height: 80px;
            font-size: 60px;
        }
        .radio-btn .hobbies-icon h3{
            color: #8373e6;
            font-family: "Raleway", sans-serif;
            font-size: 16px;
            font-weight: 200;
            text-transform: uppercase;
        }
        .custom-radio input:checked + .radio-btn{
            border: 3px solid #8373e6;
        }
        .custom-radio input:checked + .radio-btn > i{
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }
    </style>

<div style="text-align: center;">

        <!-- 
            2- Orden de Pago
            La página inicial del módulo Orden de Pago muestra en un desplegable las carreras o cursos que está realizando 
            o realizo esta es la consulta:
            public function BuscarCarreras($user) {
        /*================================================================
        ======================== BUSCO LAS CARRERAS ======================
        ==================================================================*/    
         $consulta = $this->db->prepare("SELECT alumnos.alum_idalumno,   
         alumnoscarreracurso.alcc_idccalta,
         alumnoscarreracurso.alcc_idalucarrcurs,
         carrerascursosalta.ccal_descripcion FROM (alumnos INNER JOIN
         alumnoscarreracurso ON alumnos.alum_idalumno =
         alumnoscarreracurso.alcc_idalumno)
         INNER JOIN carrerascursosalta ON alumnoscarreracurso.alcc_idccalta =
         carrerascursosalta.ccal_idccalta WHERE
         alumnos.alum_idalumno='$user'");        
         /*==============================================================
           ====================== EJECUTO LA CONSULTA =====================
           ==============================================================*/
        $consulta->execute();
        /*==============================================================
        ===================== DEVUELVO EL RESULTADO ====================
        ==============================================================*/
        return $consulta;
        }
        El $user por el que filtra es el id del alumno. OJO: Nosotros inyectamos este id se supone que lo recibe de otro lado, no sabemos cual

        En el desplegable se carga como value el campo alcc_idalucarrcurs y como
        descripción ccal_descripcion, una vez que selecciona el form envía el value del ítem
        seleccionado para buscar las cuotas impagas de esa carrera o curso.

        La búsqueda de las cuotas adeudadas de la carrera o curso seleccionado se realizacon el alcc_idalucarrcurs enviado

        Los datos de esta consulta se cargan en una tabla, cada fila es una cuota o matricula
        que se adeuda y debe tener un check para seleccionar la mis.ma Seleccionadas las
        cuotas o matriculas para abonar se ddebe seleccionar el método de pago:
         - Pago Facil/Rapipago
         - Mercadopago

        -- Etl metodo BuscarDeudasController($idalucarrcurs) ya trae las deudas y los pone en una tabla 
        -- Los metodos de pago no se hablo mucho de eso supongo que son radiobuttons igualmente no tienen funcionalidad o sea no mandan nada
        -- Disminuir el codigo php al minimo posible en el fron
        -- Falta enviar el value del select que es el idalucarrcurs y enviarselo a el metodo BuscarDeudasController(); el id que tiene esta inyectado
       

        -->
        <br><br><br><br>
        <form action="" method="GET">
        <select name="select_carreras" id="carreras" >

        <?php
            $resultado = json_decode(json_encode(App\Http\Controllers\DropDown_CarrerasCursos_Controller::BuscarCarreraController(5833172)), true);//TODO: Aca vamos a usar session para conseguir este id de alumno.
            //(App\Http\Controllers\DropDown_CarrerasCursos_Controller::BuscarCarreraController(1428697); dice que devuelve un array pero no es asociativo
            //no se puede recorrer con un foreach por lo tanto lo convierto en un array asociativo con json_decode() pero hay un problema este metodo
            //solo recibe un string JSON entonces usamos el json_encode() que retorna un string JSON y ahora lo recorremos   
            //convertimos el objeto en una matriz o array asociativa 
            //json_encode retorna un valor para que sea representado por json_decode enviamos el valor que queramos como primer parametro
            //json_decode le eviamos un string JSON como primer parametro y como segundo un true que sirve para convertirlo en un array asociativo de modo que lo podamos recorrer con un foreach
            //https://www.codewall.co.uk/how-to-fix-the-cannot-use-object-of-type-stdclass-as-array-error-in-php/ -> todo lo saque de aca el error era Cannot use object of type stdClass as array
           
           foreach($resultado as $res){ ?> <!-- En teoria recorre uno por uno los datos devuelvo en consulta por la funcion consulta_db , es parecido a mysqli_fetch_array() -->
            
            <option value="<?= $res['alcc_idalucarrcurs'] ?>"><?=$res['ccal_descripcion']?></option> 

        <?php } ?>

        <div class="container" style="text-align: center;">
                <input type="submit" value="Enviar" name="btnEnviar"> <!-- En caso de que pueda cargar un array con los ids, podre enviarlo por un boton mediante el atributo value sin js? -->
        </div>
            
        </select>
   
</div>
        <br><br><br><br><br><br>
         <!-- Si action esta vacio te redirige a la pagina actual -->
        <div>
             <!-- No traigo muchos datos porque nose que va en la tabla -->
        <table style="margin: 0 auto;" border="2">
            <caption>Tabla Deudas</caption>
            <tr>
                <th>Fecha debito</th>
                <th>Tipo pago</th>
                <th>Descripcion</th>
                <th>Importe cuota</th>
                <th>Intereses</th>
                <th>Importe Pago</th>
                <th>Opcion</th>
            </tr>

            <?php //TODO:Recordemos que estamos inyectando este id de alumno, ojo: fijarse que si esta sea impago porque si es pago no trae nada 
                $id = $_GET['select_carreras'];
             $resultado = json_decode(json_encode(App\Http\Controllers\DropDown_CarrerasCursos_Controller::BuscarDeudasController($id)), true);
             foreach($resultado as $reg) { ?> <!-- Recorro de nuevo las carreras para mostrarla en la tabla -->
                <tr>
                 <td><?= $reg['paal_fechadeb']; ?></td>
                 <td><?= $reg['paal_tipopago']; ?></td>
                 <td><?= $reg['paal_descripcion']; ?></td>
                 <td><?= $reg['paal_importecuota']; ?></td>
                 <td><?= $reg['paal_intereses']; ?></td>
                 <td><?= $reg['paal_importepago']; ?></td>
                 <td><input type="checkbox" value="<?= $reg['paal_idpagoalumno'] ?>" name="idpagoalumnos[]"></td> <!-- con checked veo si esta seleccionada -->
             </tr>
            <?php } ?>
        </table>
        <br><br>
        <div class="container" style="text-align: center;">
                <input type="submit" value="Enviar" name="btnAceptar"> <!-- En caso de que pueda cargar un array con los ids, podre enviarlo por un boton mediante el atributo value sin js? -->
        </div>

     </div>
     </form>
    <br><br><br>
    <table style="margin: 0 auto;" border="2">
                <caption>Tabla idpagoalumnos </caption>
            <tr>
                <th>ID Alumnos</th>
            </tr>
                        $id_array = App\Http\Controllers\DropDown_CarrerasCursos_Controller::capturarDatos() <!-- Ahora que se que es un array lo que vino copio el valor en un variable para recorrlo con un foreach -->
                        <?php foreach ($id_array as $id) { ?> <!-- Recorro el array de ids de pago alumno -->
                            <tr>
                                <td><?= $id; ?></td>
                            </tr>
                         <?php } ?>
    </table>

    <div class="main-container">
            <h2>Elija una opcion</h2>
            <div class="radio-buttons">
                <label class="custom-radio">
                    <input type="radio" name="radio">
                    <span class="radio-btn"> <i class="fas fa-check"></i>
                        <div class="hobbies-icon">
                            <i class="far fa-credit-card"></i>
                            <h3>Credito/Debito</h3>
                        </div>
                    </span>
                </label>
                <label class="custom-radio">
                    <input type="radio" name="radio">
                    <span class="radio-btn"> <i class="fas fa-check"></i>
                        <div class="hobbies-icon">
                            <i class="fas fa-dollar-sign"></i>
                            <h3>Efectivo</h3>
                        </div>
                    </span>
                </label>
            </div>
    </div>
       
        
                            
</body>
</html>