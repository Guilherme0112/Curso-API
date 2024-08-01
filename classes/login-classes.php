<?php                      
    class Login{
        public static function entrar($nick, $senha){
            try{
                $db = DB::connect();
                $query = $db->prepare("SELECT * FROM login WHERE nick = '$nick' AND senha = '$senha'");
                $exe = $query->execute();
                $obj = $query->fetchObject();

                if($query->rowCount() > 0){
                    $id = $obj->idlogin;
                    $name = $obj->nick;
                    $senha = $obj->senha;
                    $expire_in = time() + 60000;

                    $token = JWT::encode([
                        'id' => $id,
                        'nick' => $name,
                        'exprire' => $expire_in
                    ], $GLOBALS['secretJWT']);

                    $upd = $db->query("UPDATE login SET token = '$token' WHERE idlogin = $id");
                    if($upd){
                        echo json_encode(["token" => $token, "dados" => JWT::decode($token, $GLOBALS['secretJWT'])]);
                    } else {
                        echo json_encode(["Erro" => "Erro ao setar seu token"]);
                    }
                
                } else {
                    echo json_encode(["Erro" => "Usuário inexistente"]);
                    exit;
                }
            } catch (Exception $e){
                echo json_encode(["Erro" => $e->getMessage()]);
            }
        }
        public static function verificar(){

        }
    }

?>