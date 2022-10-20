<?php
        session_start();
        $_SESSION["nombre"]=null;
        session_destroy();
        header("location:index.php");
?>
