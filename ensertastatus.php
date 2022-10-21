<?php
$camion=$_POST['camion'];
$ruta =$_POST['ruta'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$velocidad=$_POST['velocidad'];
$combustible=$_POST['combustible'];
require_once("/CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$usuarios->insertarstatu($camion,$ruta,$latitud,$longitud,$velocidad,$combustible);
$data=$usuarios->Consulta();
if (count($data) > 0) {
    foreach ($data as $fila) {
        $cuen = $fila["Id_ruta"];
        break;
    }
    echo $cuen;
}