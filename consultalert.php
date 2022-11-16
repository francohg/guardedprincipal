<?php   
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data=$usuarios->Consultaalert();
if (count($data) > 0) {
    foreach ($data as $fila) {
        $tipo = $fila["Tipo"];
        $cam = $fila["Id_camion"];
        $fecha = $fila["Fecha"];
        echo $tipo."/*-".$cam."///".$fecha."\n";
    }
}