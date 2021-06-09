<!-- Aca va todo el codigo para conectarnos a la Base de datos de Postgrest sql -->


<?php 

$conn = pg_connect("host=localhost port=5432 dbname=db_ps user=postgres password=root") or die("Error de conexion: ". pg_last_error()); //Nota: el punto es para concatenar en php por las dudas


?>