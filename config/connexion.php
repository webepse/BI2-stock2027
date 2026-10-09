<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=bi2stock;charset=utf8mb4', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    http_response_code(500);
    die("Erreur interne");
}