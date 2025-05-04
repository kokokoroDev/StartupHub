<?php

    

    function getConnection() {
        $dsn = "mysql:host=localhost;dbname=startup_hub;charset=utf8mb4";
        $user = 'root';
        $pass = ''; 
        
        try {
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
        } catch (PDOException $e) {
            $msgErreur = $e->getMessage();
            require './Vues/ErrorVue.php';
        }
    }



?>