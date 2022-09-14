<?php 

require_once("Connection.php");

$task = $connessione->real_escape_string($_POST["task"]);
$uname = $connessione->real_escape_string($_POST["uname"]);

$query = "INSERT INTO Task values ('$task',false,'$uname')";

echo "username: " . $uname;
echo "   task: " . $task;


if($connessione->query($query) === true){
    header("location: TaskList.php");
}else{
    echo "errore nella query di inserimento, task inviata: " . $task . " ,username inviato: " . $uname;
}

?>