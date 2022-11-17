<?php
$cuen = "";
$camion = $_POST['camion'];
$ruta = $_POST['ruta'];
$cont = $_POST['latitud'];
$velocidad = $_POST['velocidad'];
$combustible = $_POST['combustible'];
$cont -= 1;
require_once("./CRUD/class/Consultas.php");
$latitud = array('19.770797', '19.770665', '19.772133', '19.770508', '19.770081', '19.771638', '19.771758', '19.770157', '19.769459', '19.771037', '19.770476');
$longitud = array('-98.571165', '-98.571581', '-98.573206', '-98.572727', '-98.573652', '-98.574328', '-98.574642', '-98.574931', '-98.575746', '-98.576507', '-98.579261');
$usuarios = Usuarios::singleton();
$fecha = (string)date("j, n, Y");
$data = $usuarios->Consultacma($camion);
if (count($data) > 0) {
    foreach ($data as $fila) {
        $cuen = $fila["Id_ruta"];
        break;
    }
}
if ($cuen == "1"||$cuen == 1) {
    $latitud = array('19.770797', '19.770665', '19.772133', '19.770508', '19.770081', '19.771638', '19.771758', '19.770157', '19.769459', '19.771037', '19.770476');
    $longitud = array('-98.571165', '-98.571581', '-98.573206', '-98.572727', '-98.573652', '-98.574328', '-98.574642', '-98.574931', '-98.575746', '-98.576507', '-98.579261');
}
if ($cuen == "2"||$cuen == 2) {
    $latitud = array('19.77039','19.77057','19.76958','19.76723','19.76668','19.76776','19.76875','19.76944','19.77299','19.77177','19.77075');
    $longitud = array('-98.57955','-98.57883','-98.57853','-98.57776','-98.57572','-98.57316','-98.57068','-98.56849','-98.57015','-98.57453','-98.57828');
}
if ($cuen == "3"||$cuen == 3) {
    $latitud = array('19.770797', '19.770665', '19.772133', '19.770508', '19.770081', '19.771638', '19.771758', '19.770157', '19.769459', '19.771037', '19.770476');
    $longitud = array('-98.57954','-98.57882','-98.57895','-98.57773','-98.57843','-98.57783','-98.57654','-98.57415','-98.57478','-98.57244','-98.57178');
}
$usuarios->insertarstatu($camion, $ruta, $latitud[$cont], $longitud[$cont], $velocidad, $combustible, $fecha);
$data = $usuarios->Consultaruta($cuen);
if (count($data) > 0) {
    foreach ($data as $fila) {
        $lon = $fila["Longitud"];
        $lat = $fila["Latitud"];
        break;
    }
}
$londif = explode(",", $lon);
$latdif = explode(",", $lat);
if ($londif[$cont] != $longitud[$cont] || $latdif[$cont] != $latitud[$cont]) {
    $usuarios->insertaalerta("El camion " . $camion . " se salio de la ruta " . $cuen, $camion, $fecha);
    $cuen = "4";
}
echo $cuen;
