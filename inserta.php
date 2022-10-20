<?php

$placas=$_POST['placas'];
$tipo =$_POST['tipo'];
$capacidad=$_POST['capacidad'];
$ruta=$_POST['ruta'];
echo "ganar";
require_once("./CRUD/class/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->insertarcam($placas,$tipo,$capacidad,$ruta);
echo $data;
?>