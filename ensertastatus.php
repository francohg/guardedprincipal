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