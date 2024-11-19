<?php

    $host = "localhost";
    $db = "viagens";
    $usuario = "root";
    $senha = "Senha123";
    $port = "3360";

    try{
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", 
                        $usuario, $senha);
        // if ($pdo){
        //     echo "Conexão realizada com sucesso!";
        // } else {
        //     echo "Erro ao conectar o banco de dados!";
        // }
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }