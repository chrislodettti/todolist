<?php

		//la función conecta para recuperar la información de la base de datos
        function conecta($dbhost, $dbuser, $dbpasswd, $dbname){
                try{
                        $mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
                        $connected = true;
                        return $mysqli;
                }
                catch (mysqli_sql_exception $e) {
                        throw $e;
                }
        }
?>
