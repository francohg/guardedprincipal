<?php
$placas=$_POST['placas'];
$tipo =$_POST['tipo'];
$capacidad=$_POST['capacidad'];
$ruta=$_POST['ruta'];
require_once("./CRUD/Consultas.php");
$usuarios = Usuarios::singleton();
$data = $usuarios->insertarcam($placas,$tipo,$capacidad,$ruta);
