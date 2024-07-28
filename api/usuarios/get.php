<?php
    if($metodo == 'lista' && $parametro == ''){
        $db = DB::connect();
        $query = $db->prepare("SELECT * FROM usuarios");
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);

        if($response){
            echo json_encode(["Dados" => $response]);
        } else {
            echo json_encode(["Dados" => "Sem dados"]);
        }
    }
    if($metodo == 'lista' && $parametro != ''){
        $db = DB::connect();
        $query = $db->prepare("SELECT * FROM usuarios WHERE id = $parametro");
        $query->execute();
        $response = $query->fetchObject();

        if($response){
            echo json_encode(["Dados" => $response]);
        } else {
            echo json_encode(["Dados" => "Sem dados"]);
        }
    }

?>