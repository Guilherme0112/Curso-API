<?php

    if($metodo == 'delete' && $parametro != ''){
        try {
            $db = DB::connect();
            $delete = $db->prepare("DELETE FROM usuarios WHERE id = $parametro");
            $delete->execute();

            echo json_encode(["Sucesso" => "Os dados foram excluídos com sucesso!"]);

        } catch (PDOException $e){
            echo json_encode(["Falha" => $e->getMessage()]);
        }
    }
?>