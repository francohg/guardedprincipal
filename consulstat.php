<?php
$id=$_POST['id'];
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->Consultasta($id); 
if (count($data) > 0) {
    foreach ($data as $fila) {
        $lat = $fila["Latitud"];
        $lon = $fila["Longitud"];
        echo $lat."+-+".$lon."\n";
    }
}else{
    echo "vacio";
}
?>