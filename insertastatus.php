<?php
$camion=$_POST['camion'];
$ruta =$_POST['ruta'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$velocidad=$_POST['velocidad'];
$combustible=$_POST['combustible'];
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$fecha = (string)date("j, n, Y");;
$usuarios->insertarstatu($camion,$ruta,$latitud,$longitud,$velocidad,$combustible,$fecha);
$data=$usuarios->Consultacma($camion);
if (count($data) > 0) {
    foreach ($data as $fila) {
        $cuen = $fila["Id_ruta"];
        break;
    }
    echo $cuen;
}
