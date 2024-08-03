<?php
    if($api == 'usuarios'){
        try{
            if(Login::verificar()){
                if($method == 'GET'){
                    include_once "get.php";
                }
                if($method == 'POST' && empty($_POST['_method'])){
                    include_once "post.php";
                    $_POST['_method'] = '';
                }
                if($method == 'POST' && $_POST['_method'] == 'PUT'){
                    include_once "put.php";
                }
                if($method == 'POST' && $_POST['_method'] == 'DELETE'){
                    include_once "delete.php";
                }
            }
        } catch (Exception $e){
            echo json_encode(["Erro" => $e->getMessage()]);
        }
    }
?>