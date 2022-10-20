<?php
   require_once("validasesion.php");
?>
<button id="cerrar">Cerrar sesion</button>
<script src="jquery-3.6.0.min.js"></script>
<script>
    $("#cerrar").click(function () {
        location.href="cerrarsesion.php";
    });
</script>