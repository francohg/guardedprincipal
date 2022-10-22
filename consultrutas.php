<?php
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->Consulta(); 
if (count($data) > 0) {
    foreach ($data as $fila) {
        $camion = $fila["Id_camion"];
        $cuen = $fila["Id_ruta"];
        echo $camion."/*-".$cuen."\n";
    }
}
?>