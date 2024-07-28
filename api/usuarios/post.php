<?php

    if($method == 'POST'){
        if(strlen($_POST['nome']) > 3 && strlen($_POST['nome']) < 50 && strlen($_POST['senha'] > 4 && strlen($_POST['senha']) < 16 && strlen($_POST['telefone']) == 15)){
            try{
                $db = DB::connect();
                $sql = $db->prepare("INSERT INTO usuarios VALUES (DEFAULT, ' " . $_POST['nome'] . " ' , ' " . $_POST['email'] . " ', ' " . $_POST['telefone'] . " ', ' " . $_POST['senha'] . " ', DEFAULT)");
                $sql->execute();
                
                echo json_encode(["Sucesso" => "Os dados foram salvos com sucesso!"]);
            } catch(PDOException $e){
                echo json_encode(["Erro" => $e->getMessage()]);
            }
        } else {
            if(strlen($_POST['nome']) < 4 || strlen($_POST['nome']) > 50){
                echo json_encode(["Nome" => "O nome deve ter entre 4 e 50 caracteres"]);
            }
            if(strlen($_POST['senha'] < 5 || strlen($_POST['senha']) > 16)){
                echo json_encode(["Senha" => "A senha deve ter entre 4 e 16 caracteres"]);
            }
            if(strlen($_POST['telefone']) != 15){
                echo json_encode(["Telefone" => "O telefone deve estar no seguinte formato: (00) 00000-0000"]);
            }
        }
    }
?>