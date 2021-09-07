<?php 
try{
    session_start();
    $bdd = new PDO('mysql:host=localhost;port=3307;dbname=forum;charset=utf8', 'root', 'root');
}catch(Exception $e){
    die('An error has occurred : ' . $e->getMessage());
}
