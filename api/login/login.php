<?php
    if($api === "login"){
        if($method === "POST" && isset($_POST['nick'], $_POST['senha'])){
            $nick = $_POST['nick'];
            $senha = $_POST['senha'];
            try{
                Login::entrar($nick, $senha);
            } catch (Exception $e){
                echo json_encode(["Erro" => $e->getMessage()]);
            }
        } else {
            echo json_encode(["Erro" => "Você deve colocar as credenciais"]);
        }
    }
?>