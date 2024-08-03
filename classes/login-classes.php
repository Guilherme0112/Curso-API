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
                        'expire' => $expire_in
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
            $headers = apache_request_headers();
            if(isset($headers['Authorization'])){
                $token = $headers['Authorization'];
            } else {
                echo json_encode(["Erro" => "Você não está logado"]);
                exit;
            }

            $db = DB::connect();
            $query = $db->prepare("SELECT * FROM login WHERE token = '$token'");
            $exe = $query->execute();
            $obj = $query->fetchObject();

            if($query->rowCount() > 0){
                $idDB = $obj->idlogin;
                $tokenDB = $obj->token;

                $decodeJWT = JWT::decode($tokenDB, $GLOBALS['secretJWT']);
                if($decodeJWT->expire < time()){
                    $upd = $db->query("UPDATE login SET token = '' WHERE idlogin = $idDB");
                    return false;
                } else {
                    return true;
                }
            } else {
                echo json_encode(["Erro" => "Você não tem autorização"]);
                exit;
            }
        }
    }

?>