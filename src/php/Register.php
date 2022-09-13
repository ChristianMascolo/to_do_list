<?php

require_once("Connection.php");

$uname = $connessione->real_escape_string($_POST['uname']);
$pwd = $connessione->real_escape_string($_POST['pwd']);

$sql = "INSERT INTO User(uname,pwd) VALUES('$uname','$pwd')";

if($connessione->query($sql) === true){
    echo "Ti sei registrato con successo";
}else{
    echo "Errore durante la registrazione".$connessione->error;
}

$connessione->close();

?>