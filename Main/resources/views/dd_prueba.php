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
        <br><br><br><br>
        <select name="select_carreras" id="carreras">
        <?php         

        // Inyectamos un id de un alumno random a modo de prueba
        //$resultados = \App\Http\Services\db_cosulta::BuscarCarrera(1428697)
        $respuesta = App\Http\Controllers\DropDown_CarrerasCursos_Controller::BuscarCarreraController(1428697);
        if($respuesta == -1 ){
            //
        }else if ( $respuesta == 0){
            //
        }else {
            $resultados = (array) $respuesta;
        }
    
        ?> 
        <!-- Esto tambien se puede hacer con un foreach , seria foreach($resultado as $resultado){} -->
        <?php for($i = 0; $i<count($resultados); $i++){ ?> <!-- En teoria recorre uno por uno los datos devuelvo en consulta por la funcion consulta_db , es parecido a mysqli_fetch_array() -->

            <option value="<?= $resultados[$i]['alcc_idalucarrcurs'] ?>"><?= $resultados[$i]['ccal_descripcion'] ?></option>

            <?php } ?>

        </select>

</div>
        <br><br><br><br><br><br>
    <div>
             <!-- No traigo muchos datos porque nose que va en la tabla -->
        <table style="margin: 0 auto;" border="2">
            <tr>
                <th>Fecha debito</th>
                <th>Tipo pago</th>
                <th>Descripcion</th>
                <th>Importe cuota</th>
                <th>Intereses</th>
                <th>Importe Pago</th>
                <th>Opcion</th>
            </tr>

            <?php ; //TODO:Recordemos que estamos inyectando este id de alumno, ojo: fijarse que si esta sea impago porque si es pago no trae nada ?> 
            <?php for($i = 0; $i<count($resultados); $i++){ ?> <!-- Recorro de nuevo las carreras para mostrarla en la tabla -->
                <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td><input type="checkbox" value="<?= $reg['paal_idpagoalumno'] ?>"></td> <!-- con checked veo si esta seleccionada -->
             </tr>
            <?php } ?>
            
        </table>
        <br><br>
        <div class="container" style="text-align: center;">
                <button type="submit" value="">Enviar</button> <!-- En caso de que pueda cargar un array con los ids, podre enviarlo por un boton mediante el atributo value sin js? -->
        </div>

    </div>

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