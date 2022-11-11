<?php
$id=$_POST['id'];
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->Consultasta($id); 
if (count($data) > 0) {
    foreach ($data as $fila) {
        $ruta = $fila["Id_ruta"];
        $lat = $fila["Latitud"];
        $lon = $fila["Longitud"];
        $vel = $fila["Velocidad"];
        $com = $fila["Combustible"];
        echo $ruta."/*-".$lat."+-+".$lon."$$$".$vel."///".$com;
        break;
    }
}else{
    echo "vacio";
}
?>