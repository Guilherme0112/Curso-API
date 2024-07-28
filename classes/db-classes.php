<?php
    class DB{
        public static function connect(){
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'cursoapi';

            return new PDO("mysql: host=$dbhost;
                            dbname=$dbname;",
                            $dbuser, 
                            $dbpass
                        );
        }
    }
?>