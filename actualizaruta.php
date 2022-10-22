<?php
     try {
        $camion=$_POST['camion'];
    $ruta=$_POST['ruta'];
    require_once("./CRUD/class/Consultas.php");
    $usuarios = Usuarios::singleton();
    $data = $usuarios->Actualizar($camion,$ruta); 
    echo $data;
    } catch (PDOException $e) {
        $e->getMessage();
    }
?>