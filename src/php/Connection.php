<?php 

$host = "localhost";
$user = "php";
$pwd = "password";
$db = "ToDoList";

$connessione = new mysqli($host,$user,$pwd,$db);

if($connessione === false){
    die("Errore durante la connessione: ".$connessione->connect_error);
}

?>