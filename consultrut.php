<?php
$id=$_POST['ruta'];
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->Consultaruta($id); 
if (count($data) > 0) {
    foreach ($data as $fila) {
        $camion = $fila["Longitud"];
        $cuen = $fila["Latitud"];
        echo $camion."/*-".$cuen;
    }
}
?>