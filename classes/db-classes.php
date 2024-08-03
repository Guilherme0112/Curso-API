<?php
    class DB{
        public static function connect(){
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'curso-api';

            return new PDO("mysql: host=$dbhost;
                            dbname=$dbname;",
                            $dbuser, 
                            $dbpass
                        );
        }
    }
?>