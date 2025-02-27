<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    date_default_timezone_set('America/Sao_Paulo');
    
    if(isset($_GET['url'])){
        $url = explode("/", $_GET['url']);
    } else{
        echo "Caminho inexistente";
    }

    if(isset($url[0])){
        $api = $url[0];
    } else {
        echo "Este caminho é inexistente";
        exit;
    }
    if(isset($url[1])){
        $metodo = $url[1];
    } else {
        $metodo = '';
    }
    if(isset($url[2])){
        $parametro = $url[2];
    } else {
        $parametro = '';
    }

    $method = $_SERVER['REQUEST_METHOD'];
    $GLOBALS['secretJWT'] = '123456';
    
    // CLasses
    include_once "classes/db-classes.php";
    include_once "classes/jwt-classes.php";
    include_once "classes/login-classes.php";
    
    // Api's
    include_once "api/login/login.php";
    include_once "api/usuarios/usuarios.php";
    
?>