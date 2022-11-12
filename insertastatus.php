<?php
$camion=$_POST['camion'];
$ruta =$_POST['ruta'];
$cont=$_POST['latitud'];
$velocidad=$_POST['velocidad'];
$combustible=$_POST['combustible'];
require_once("./CRUD/class/Consultas.php");
$latitud = array('19.770797', '19.770665', '19.772133','19.770508', '19.770081', '19.771638','19.771758', '19.770157', '19.769459','19.771037','19.770476');
$longitud = array('-98.571165', '-98.571581', '-98.573206','-98.572727', '-98.573652', '-98.574328','-98.574642', '-98.574931', '-98.575746','-98.576507','-98.579261');
$usuarios = Usuarios::singleton();
$fecha = (string)date("j, n, Y");
$usuarios->insertarstatu($camion,$ruta,$latitud[$cont],$longitud[$cont],$velocidad,$combustible,$fecha);
$data=$usuarios->Consultacma($camion);
if (count($data) > 0) {
    foreach ($data as $fila) {
        $cuen = $fila["Id_ruta"];
        break;
    }
    echo $cuen;
}
