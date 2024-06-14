<?php
    
    $host = 'localhost';
    $dbname = 'financas_pessoais';
    $username = 'root';
    $password = '';
    try {
        define('ROOT_PATH', dirname(__DIR__) . '/');
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
            // echo "Conectado a $dbname em $host com sucesso.";
        if(!isset($_SESSION["usuario_codigo"])) {
            session_start();  
        }      
    } catch (PDOException $pe) {
        die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage()); 
    }
    ?>