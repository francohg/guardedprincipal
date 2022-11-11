<?php
$id=$_POST['id'];
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->Consultacma($id); 
if (count($data) > 0) {
    foreach ($data as $fila) {
        $cuen = $fila["Id_ruta"];
        echo $cuen;
    }
}
?>