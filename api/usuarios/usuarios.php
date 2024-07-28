<?php
    if($api == 'usuarios'){
        if($method == 'GET'){
            include_once "get.php";
        }
        if($method == 'POST' && empty($_POST['_method'])){
            include_once "post.php";
        }
        if($method == 'POST' && $_POST['_method'] == 'PUT'){
            include_once "put.php";
        }
    }
?>