<?php
    
    /*---------- codigo para ver errores que se generan ------------ */ 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    /*---------- Incluyendo archivos necesarios ------------ */ 
    require_once "./config/app.php"; #configuracion de la aplicacion

    require_once "./autoload.php"; #autocarga de clases

    require_once "./app/views/inc/session_start.php"; #iniciar sesion

    /*---------- Valida el metodo GET views existe ----------*/
    if(isset($_GET['vista'])){
        $url=explode("/", $_GET['vista']);
    }else{
        $url=["login"];
    }

    /*---------- Incluir cuerpo html ----------*/
    include_once './app/views/inc/head.php';
    include_once './app/views/inc/body.php';

?>

