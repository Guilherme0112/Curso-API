<?php
    if($metodo == 'update' && $parametro != ''){
        array_shift($_POST);
        $mensagem = array();
        $db = DB::connect();
        try{
            if(isset($_POST['nome']) || isset($_POST['senha']) || isset($_POST['telefone']) || isset($_POST['email'])){
                if(isset($_POST['nome']) && strlen($_POST['nome']) > 3 && strlen($_POST['nome']) < 50){
                    $sql = $db->prepare("UPDATE usuarios SET nome = '" . $_POST['nome'] . "' WHERE id = $parametro");
                    $sql->execute();
                    $mensagem[] = 'nome';
                }
                if(isset($_POST['senha']) && strlen($_POST['senha'] > 4 && strlen($_POST['senha']) < 16)){
                    $sql = $db->prepare("UPDATE usuarios SET senha = '" . $_POST['senha'] . "' WHERE id = $parametro");
                    $sql->execute();
                    $mensagem[] = 'senha';
                }
                if(isset($_POST['telefone']) && strlen($_POST['telefone']) === 15){
                    $sql = $db->prepare("UPDATE usuarios SET telefone = '" . $_POST['telefone'] . "' WHERE id = $parametro");
                    $sql->execute();
                    $mensagem[] = 'telefone';
                }
                if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $sql = $db->prepare("UPDATE usuarios SET email = '" . $_POST['email'] . "' WHERE id = $parametro");
                    $sql->execute();
                    $mensagem[] = 'email';
                }
            } else {
                echo json_encode(["Erro" => "É preciso preencher algum campo para editar os dados"]);
                exit;
            }

            // mensagem caso dê certo

            $msg = null;
            foreach($mensagem as $palavra){
                $msg .= " $palavra,"; 
            }
            $msg = substr($msg, 0, -1);
            echo json_encode(["Sucesso" => "O(s) campo(s)$msg foram modificados"]);

        } catch (PDOException $e){
            echo json_encode(["Erro" => $e->getMessage()]);
            exit;
        }
    }
?>