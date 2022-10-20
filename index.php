<?php
//Include EL CONECTOR A GMAIL https://console.developers.google.com
include_once 'gpConfig.php';
//VERIFICANDO SI YA SE LOGUEO
$errorNI = "";
if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

$output = "";
if ($gClient->getAccessToken()) { //SE HA LOGUEADO
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    //RESCATANDO CORREO ELECTR�NICO
    $email = $gpUserProfile['email'];
    //SEPARANDO POR EL @
    $cade = explode("@", $email);
    $p1 = $cade[0];
    $p2 = $cade[1];
    $errorNI = "";
    //PRIMERO SE VALIDA POR DOMINIO DE CORREO ELECTR�NICO
    if ($p2 != "itesa.edu.mx") {
        $errorNI = "No es correo de ...";
        $authUrl = $gClient->createAuthUrl();
        $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="images/gmail.png" alt=""/></a>';
    } else {
        require_once("CRUD/class/Consultas.php");
        $usuarios = Usuarios::singleton();
        $data = $usuarios->Consulta($email);
        //SI SE PUEDE LOGUEAR YA SOLO QUEDA HACER OTRAS VALIDACIONES PARA PODER INGRESAR
        //SE PUEDE HACER CONSULTA A BASE DE DATOS Y VERIFICAR USUARIO
        if (count($data) > 0) {
            $_SESSION["usuario"] = $email;
            header('Location:iniciado.php');
        } else {
            $errorNI = "NO TE ENCUENTRAS EN LA BASE DE DATOS DE ...";
            $authUrl = $gClient->createAuthUrl();
            $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="images/gmail.png" alt=""/></a>';
        }
    }
    //echo( $email );
} else { //SI NO SE LOGUEO PIDE QUE SE LOGUEE
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="images/gmail.png" alt=""/></a>';
}
?>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>LOGIN ...</title>
        <style type="text/css">
            h3 {
                font-family: Arial, Helvetica, sans-serif;
            }
            #externo{
                border: 2px solid #050505;

                color: white;
                text-align: center;
                padding: 20px;
                border-radius: 30px;
                margin: 50 auto;
                height: auto;
                width: 400px;

                background-color: #06490E;
            }

            #interno{
                color: white;
                margin: 0 auto;
                height: auto;
                padding: 10px;
                width: 300px;
            }

            img{
                height: 70px;
                width: 70px;

            }
        </style>
    </head>

    <body>

        <div id="externo">
            <h2>INGRESO A ...</h2>
            <h3>LOGUEATE CON TU CUENTA DE ...</h3>
            <div id="interno">
                <h4>SIGN IN WITH GOOGLE </h4><?php echo $output; ?>
            </div>
            <h4><?php echo $errorNI; ?></h4>
        </div>
    </body>

</html>